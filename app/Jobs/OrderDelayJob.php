<?php

namespace App\Jobs;

use App\Events\OrderDelayed;
use App\Models\Order;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class OrderDelayJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         Log::info("Orders not picked in 30 minutes: ");
        $minutesAgo = Carbon::now()->subMinutes(5);

        $awaitingOrders = Order::where('status', OrderStatusEnum::NOT_PICKED->value)
            ->where('created_at', '<=', $minutesAgo)
            ->with(['owner'])  
            ->get();

        Log::info("Orders not picked in 30 minutes: ", $awaitingOrders->toArray());

        // Optional: Notify users, send emails, etc.
        foreach ($awaitingOrders as $order) {
            broadcast(new OrderDelayed($order));
        }
    }
}
