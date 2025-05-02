<?php

namespace App\Console\Commands;

use App\Events\OrderDelayed;
use App\Jobs\OrderDelayJob;
use App\Models\Order;
use App\OrderStatusEnum;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class OrderDelayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:order-delay-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $minutesAgo = Carbon::now()->subMinutes(30);
        $awaitingOrders = Order::where('status', OrderStatusEnum::NOT_PICKED->value)
            ->where('created_at', '<=', $minutesAgo)
            ->get();
        // Log::info("Broadcasted delayed orders: ", $awaitingOrders->toArray());
        foreach ($awaitingOrders as $order) {
            broadcast(new OrderDelayed($order));
        }
        // dd($awaitingOrders);
    }
}
