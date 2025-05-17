<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\VisitorArrivedNotification;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getPendingOrderForOwner()
    {
        $orders = Order::where('owner_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)
            ->whereDate('created_at', Carbon::today())
            ->with('items')
            ->withCount('items')->get();
        return view('users.index', compact('orders'));
    }

    public function getOwnerOrderHistory()
    {
        return view('users.history', [
            'orders' => Order::where('owner_id', Auth::id())
                ->whereNotIn('status', [OrderStatusEnum::PENDIND->value])
                ->withCount('items')
                ->get()
        ]);
    }

    public function getVisitorsForOwner(Request $request)
    {
        $visitors = $this->filterVisitor($request)
            ->where('employee_id', Auth::id())
            ->where('is_confirmed', true)
            ->where('created_at', today())
            ->paginate();
        return view('users.visitor.index', compact('visitors'));
    }

    public function getUserVisitorsHistory(Request $request)
    {
        $visitors = $this->filterVisitor($request)
            ->where('employee_id', Auth::id())
            ->where('is_confirmed', true)
            ->whereDate('created_at', '<', Carbon::today())
            ->paginate();
        return view('users.visitor.history', compact('visitors'));
    }

    public function removeOrderItems(Request $request, OrderItem $orderItem)
    {
        $order = $orderItem->order->items->count();
        if ($order === 1) {
            $orderItem->order->status = OrderStatusEnum::CANCELED->value;
            $orderItem->order->save();
        }

        (int)$orderItem->order->total_amount -= (int)$orderItem->amount;
        $orderItem->order->save();
        $orderItem->delete();
        return back()->with('success', 'Item removed successfully');
    }

    public function addOrderItems(Request $request, Order $order)
    {
        return view('users.add-item', compact('order'));
    }

    public function updateOrderItems(UpdateOrderItemRequest $request, Order $order)
    {
        $storage = null;
        $count = $order->getItemsCount();
        try {
            $storage = saveFileUpload($request);
            $order->items()->create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'image' => $storage ? '/uploads/' . $storage : null,
                'amount' => (int)$request->price * (int)$request->quantity,
                'note' => $request->note
            ]);
            (int)$order->total_amount += ((int)$request->price * (int)$request->quantity);
            if ($count === 0) {
                $order->status = OrderStatusEnum::PENDIND->value;
            }
            $order->save();
            return back()->with('success', 'Item added successfully');
        } catch (Exception $e) {
            Log::error('Order Update:: ' . $e->getMessage());
            return back()->with('error', 'Error occur while updating order');
        }
    }


    public function deleteOrder(Request $request, Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order deleted successfully');
    }


    public function storeSub(Request $request)
    {
        // return $request->all();
        auth()->user()->updatePushSubscription(
            $request->endpoint,
            $request->keys['p256dh'],
            $request->keys['auth']
        );
        return response()->json(['success' => true]);
    }

    public function send(Request $request)
    {
        $user = auth()->user();
        $user->notify(new VisitorArrivedNotification()); 

        return back()->with('success', 'Notification sent!');
    }
}
