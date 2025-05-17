<?php

namespace App\Support\Helper;

use App\Models\Order;
use App\Models\Visitor;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait Filter
{

    public function filterVisitor(Request $request)
    {
        $request = validateFilterRequest($request);
        extract($request);
        $visitors = Visitor::query();
        $visitors->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            });
        });
        return $visitors->with(['user', 'latestCheckin.user']);
    }


    public function getDashboardData(Request $request)
    {

        $data = validateFilterRequest($request);
        extract($data);
        $dateRange = match (strtolower($period)) {
            'week' => [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ],
            'month' => [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ],
            'today' => [
                Carbon::today(),
                Carbon::today()->endOfDay(),
            ],
            default => [
                Carbon::today(),
                Carbon::today()->endOfDay(),
            ]
        };

        $visitorsCount = Visitor::whereBetween('created_at', $dateRange)->where('is_confirmed', true)->count();
        $ordersCount = Order::whereBetween('created_at', $dateRange)->count();
        $recentVisitors = $this->filterVisitor($request)->whereDate('created_at', Carbon::today())->where('is_confirmed', true)->limit(3)->get();
        $totalCompletedOrder = Order::where('status', OrderStatusEnum::SUCCESSFULL->value)->whereBetween('created_at', $dateRange)->count();
        $totalCancelOrder = Order::where('status', OrderStatusEnum::CANCELED->value)->whereBetween('created_at', $dateRange)->count();
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->withCount('items')->get();
        $yesterdaysOrder = Order::whereDate('created_at', now()->subDay())->withCount('items')->take(2)->get();
        return [
            'visitorsCount' => $visitorsCount,
            'ordersCount' => $ordersCount,
            'recentVisitors' => $recentVisitors,
            'todaysOrder' => $todaysOrder,
            'yesterdaysOrder' => $yesterdaysOrder,
            'totalCompletedOrder' => $totalCompletedOrder,
            'totalCancelOrder' => $totalCancelOrder
        ];
    }
}
