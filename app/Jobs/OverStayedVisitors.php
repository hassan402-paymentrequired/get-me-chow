<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class OverStayedVisitors implements ShouldQueue
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
        $threeHoursAgo = now()->subHours(3);
        $overStayedVisitors = \App\Models\Visitor::whereHas('latestCheckin', function ($q) use ($threeHoursAgo) {
            $q->where('check_in_time', '<=', $threeHoursAgo)
                ->whereNull('check_out_time');
        })->with('latestCheckin.user')->get();

        foreach ($overStayedVisitors as $visitor) {
            $user = User::where('is_admin', true)->first();
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Overstay Alert',
                'message' => 'Visitor ' . $visitor->name . ' has overstayed their visit.',
                'type' => 'warning',
                'is_read' => false,
            ]);
        }
    }
}
