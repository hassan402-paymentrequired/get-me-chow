<?php

use App\Models\Order;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('order.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('order.delayed.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
Broadcast::channel('order.message.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});


Broadcast::channel('order.{orderId}', function ($user, $orderId) {
    // Only allow users associated with the order
    return Order::where('id', $orderId)
        ->where(function ($query) use ($user) {
            $query->where('buyer_id', $user->id)
                ->orWhere('owner_id', $user->id);
        })
        ->exists();
});
