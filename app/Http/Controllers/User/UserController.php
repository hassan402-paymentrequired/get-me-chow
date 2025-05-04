<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function getPendingOrderForOwner()
    {
        $orders = Order::where('owner_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')->get();
        return view('users.index', compact('orders'));
    }

    public function getOwnerOrderHistory()
    {
        return view('history', [
            'orders' => Order::where('owner_id', Auth::id())
                ->whereNotIn('status', [OrderStatusEnum::PENDIND->value, OrderStatusEnum::NOT_PICKED->value])
                ->withCount('items')
                ->get()
        ]);
    }
}
