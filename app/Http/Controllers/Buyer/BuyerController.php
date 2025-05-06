<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Order;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BuyerController
{
    public function getPendingOrderForBuyer()
    {
        $orders = Order::where('buyer_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')
            ->with('owner')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('buyer.index', compact('orders'));
    }


    public function getRecentOrderForBuyer()
    {
        $orders = Order::where('buyer_id', Auth::id())->where('status', OrderStatusEnum::PENDIND)->with('owner')
            ->whereDate('created_at', Carbon::today())
            ->withCount('items')
            ->get();

        return view('buyer.pending', compact('orders'));
    }

      public function getBuyerOrderHistory()
    {
        $orders = Order::where('buyer_id', Auth::id())
            ->where('status', '!=', OrderStatusEnum::PENDIND->value)
            ->withCount('items')
            ->get();
        return view('buyer.history', compact('orders'));
    }
}
