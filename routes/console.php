<?php

use App\Jobs\OrderDelayJob;
use App\Models\User;
use App\Notifications\OrderReminderNotification;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(new OrderDelayJob)->everyFiveSeconds();


Schedule::call(function () {
    User::chunk(100, function ($users) {
        foreach ($users as $user) {
            $user->notify(new OrderReminderNotification());
        }
    });
})->dailyAt('13:00');



// Schedule::command('order-delay-command')->everyFiveSeconds();
