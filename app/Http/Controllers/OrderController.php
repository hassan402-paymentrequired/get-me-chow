<?php

namespace App\Http\Controllers;

use App\Events\OrderPlacedEvent;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\AccountNumber;
use App\Models\OrderItem;
use App\Models\User;
use App\OrderStatusEnum;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buyers = User::where('is_buyer', 1)->get();
        return view('order.create', compact('buyers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $items = json_decode($request->items, true);

        $path = null;

        if ($request->hasFile('payment_screenshot')) {
            $path = $request->file('payment_screenshot')->store('screenshots');
        }

        $order = Order::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'buyer_id' => $request->buyer,
            'total_amount' => $request->total_amount,
            'payment_screenshot' => $path,
            'total_amount' => $request->total
        ]);


        foreach ($items as $item) {
            $path = null;
            $imagePath = null;
            if (isset($item['image']) && !empty($item['image'])) {
                $imageData = $item['image'];

                if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                    $image = substr($imageData, strpos($imageData, ',') + 1);
                    $image = str_replace(' ', '+', $image);
                    $extension = strtolower($type[1]);
                    $imageName = uniqid() . '.' . $extension;
                    Storage::put("images/{$imageName}", base64_decode($image));
                    $imagePath = "images/{$imageName}";
                    $item['image'] = $imagePath;
                }
            }


            $order->items()->create([
                'name' => $item['name'],
                'quantity' => $item['q'],
                'amount' => $item['price'],
                'note' => $item['note'],
                'image' => $imagePath
            ]);
        }
        broadcast(new OrderPlacedEvent($order->buyer_id, $order));

        return redirect()->back()->with('success', 'Order placed successfully.');
    }

    public function repeat()
    {
        $yesterday = now()->subDay()->toDateString();
        $lastOrder = auth()->user()->orders()->whereDate('created_at', $yesterday)->first();

        if ($lastOrder) {
            $newOrder = $lastOrder->replicate();
            $newOrder->created_at = now();
            $newOrder->save();
            return back()->with('success', 'Order repeated successfully.');
        }

        return back()->with('error', 'No order found to repeat.');
    }


    public function acceptOrder(Request $request, Order $order)
    {
        $order->status = OrderStatusEnum::PENDIND->value;
        $order->save();
        notify()->success('Order Accepted Successfully');
        return to_route('buyer.dashboard');
    }


    public function downloadOrders()
    {
        $orders = Order::whereDate('created_at', today())->get();
        $pdf = Pdf::loadView('pdf.orders', compact('orders'));
        return $pdf->download('orders.pdf');
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = $order->load('items');
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }


    public function getPendingOrderForBuyer()
    {
        $orders = Order::where('buyer_id', Auth::id())->where('status', OrderStatusEnum::NOT_PICKED)
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')
            ->orderBy('created_at', 'desc')
            ->get();


        // notify()->warning('You have ' . $orders->count() . ' orders');

        return view('buyer.index', compact('orders'));
    }

    public function getPendingOrderForOwner()
    {
        $orders = Order::where('owner_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')->get();
        return view('dashboard', compact('orders'));
    }


    public function getRecentOrderForBuyer()
    {
        $orders = Order::where('buyer_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)->with('owner')
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')
            ->get();
        return view('buyer.index', compact('orders'));
    }

    public function getBuyerOrderHistory()
    {
        $orders = Order::where('buyer_id', Auth::id())
            ->where('status', '!=', OrderStatusEnum::PENDIND->value)
            ->withCount('items')
            ->get();
        return view('buyer.history', compact('orders'));
    }

    public function getOwnerOrderHistory()
    {
        $orders = Order::where('owner_id', Auth::id())
            ->where('status', '!=', OrderStatusEnum::PENDIND->value)
            ->orWhere('status', '!=', OrderStatusEnum::NOT_PICKED->value)
            ->withCount('items')
            ->get();
        return view('history', compact('orders'));
    }


    public function updateOrderItemStatus(Request $request, OrderItem $orderItem)
    {
        try {
            $request->validate([
                'status' => 'required|in:1,2,3,4'
            ]);
            $orderItem->update([
                'status' => $request->status
            ]);
            notify()->success('Order item status updated successfully.');
            return back();
        } catch (Exception $e) {
            Log::error('Order Update:: ' . $e->getMessage());
            return back()->with('error', 'Error occur while updating order');
        }
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        try {
            $order->status = OrderStatusEnum::SUCCESSFULL->value;
            $order->save();
            return back()->with('success', 'Order mark as successfull');
        } catch (Exception $e) {
            Log::error('Order Update:: ' . $e->getMessage());
            return back()->with('error', 'Error occur while updating order');
        }
    }


    public function getUserAccountInfo(User $user)
    {
        $accounts = AccountNumber::where('user_id', $user->id)->get();
        if ($accounts->isEmpty()) {
            return response()->json([
                'message' => 'No account found for this user'
            ], 404);
        }
        return response()->json([
            'accounts' => $accounts,
            'user' => $user->first_name . ' ' . $user->last_name,
        ]);
    }
}
