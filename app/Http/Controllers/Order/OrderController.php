<?php

namespace App\Http\Controllers\Order;

use App\Events\OrderMessageSentEvent;
use App\Events\OrderPlacedEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\AccountNumber;
use App\Models\Chat;
use App\Models\OrderItem;
use App\Models\User;
use App\OrderItemStatusEnum;
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
        if (Auth::user()->is_buyer) abort(403);
        $buyer = User::where('current_buyer', true)->first();
        $alreadyBookForToday = hasBooked();
        return view('order.create', compact('buyer', 'alreadyBookForToday'));
    }


    public function store(StoreOrderRequest $request)
    {
        // dd($request->all());
        try {
            $items = json_decode($request->items, true);
            $path = saveFileUpload($request, 'payment_screenshot');

            $order = Order::create([
                'owner_id' => Auth::id(),
                'name' => $request->name,
                'buyer_id' => $request->buyer,
                'total_amount' => $request->total_amount,
                'payment_screenshot' => $path ? '/uploads/' . $path : null,
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
                        // Storage::put(" /{$imageName}", base64_decode($image));
                        $imageName = Storage::disk('public_uploads')->putFileAs(base64_decode($image), time() . '_' . $imageName);
                        $imagePath = "uploads/{$imageName}";
                        $item['image'] = $imagePath;
                        // $item['image'] = saveFileWithoutCheck($);
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
            // broadcast(new OrderPlacedEvent($order->buyer_id, $order));

            return redirect()->back()->with('success', 'Order placed successfully.');
        } catch (Exception $e) {
            Log::error('Error creating order', $e->getMessage());
            return back()->with('error', 'An error occur while creating order');
        }
    }

    public function repeatLastOrder()
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

    public function repeat(Order $order)
    {
        if (hasBooked()) {
            return back()->with('error', 'You already have a booked an order today');
        }
        $totalpamount = 0;
        $newOrder = $order->replicate();
        $newOrder->created_at = now();
        $newOrder->total_amount = 0;
        $newOrder->payment_screenshot = null;
        $newOrder->status = OrderStatusEnum::PENDIND->value;
        $newOrder->save();
        foreach ($order->items as $item) {
            $newOrder->items()->create([
                'name' => $item->name,
                'image' => $item->image,
                'amount' => $item->amount,
                'note' => $item->note,
                'size' => $item->size,
                'status' => OrderItemStatusEnum::PENDING->value,
            ]);
            $totalpamount += (int)$item->amount;
        }
        $newOrder->total_amount += $totalpamount;
        if ($order->items->count() === 0) {
            $newOrder->status = OrderStatusEnum::CANCELED->value;
            $newOrder->save();
        }
        $newOrder->save();
        return to_route('dashboard')->with('success', 'Order repeated successfully.');
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
        $orders = Order::whereDate('created_at', today())->with(['owner', 'items'])->get();
        // dd($orders);
        $pdf = Pdf::loadView('pdf.orders', compact('orders'));
        return $pdf->download('pdf.orders');
    }

    public function sendMesssage(Request $request, Order $order)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $message = $order->chats()->create([
            'message' => $request->message,
            'user_id' =>  Auth::id(),
        ]);

        broadcast(new OrderMessageSentEvent($message));

        return response()->json(['status' => 'Message sent']);
    }

    public function getOrderMesssages(Order $order)
    {
        return response()->json(['messages' => $order->chats()->with('user')->get()]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = $order->load('items', 'owner', 'buyer');
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
            foreach ($order->items as $item) {
                $item->status = OrderItemStatusEnum::BOUGHT->value;
                $item->save();
            }
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
