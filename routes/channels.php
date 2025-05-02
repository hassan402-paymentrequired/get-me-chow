<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('order.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('order.delayed.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
