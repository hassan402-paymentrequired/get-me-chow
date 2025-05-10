<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            ->paginate();
        return view('users.visitor.index', compact('visitors'));
    }

    public function getUserVisitorsHistory(Request $request)
    {
        $visitors = $this->filterVisitor($request)
            ->where('employee_id', Auth::id())
            ->where('is_confirmed', true)
            ->whereDate('created_at', '<' , Carbon::today())
            ->paginate();
        return view('users.visitor.history', compact('visitors'));
    }


}
