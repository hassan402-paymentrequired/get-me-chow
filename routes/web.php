<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [OrderController::class, 'getPendingOrderForOwner'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('order')->group(function () {
        Route::get('/make-order', [OrderController::class, 'create'])->name('order.create');
        Route::post('/make-order', [OrderController::class, 'store'])->name('order.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
        Route::post('/orders/repeat', [OrderController::class, 'repeat'])->name('orders.repeat');
        Route::get('/orders/download', [OrderController::class, 'downloadOrders'])->name('orders.download');

    });


    Route::prefix('buyer')->group(function () {
        Route::get('/recent-order', [OrderController::class, 'getPendingOrderForBuyer'])->name('order.recent.index');
        Route::get('/m/dashboard', [OrderController::class, 'getRecentOrderForBuyer'])->name('buyer.dashboard');
        Route::get('/m/history', [OrderController::class, 'getBuyerOrderHistory'])->name('buyer.history.index');
        Route::patch('/update-order-item/{orderItem}', [OrderController::class, 'updateOrderItemStatus'])->name('buyer.update.order.item.status');
        Route::patch('/accept-order/{order}', [OrderController::class, 'acceptOrder'])->name('buyer.order.accept');
    });


    Route::prefix('owner')->group(function () {
        Route::patch('/update-order/{order}', [OrderController::class, 'updateOrderStatus'])->name('owner.order.update');
        Route::get('/history', [OrderController::class, 'getOwnerOrderHistory'])->name('owner.history.index');
    });

    Route::get('/user/{user}/account', [OrderController::class, 'getUserAccountInfo'])->name('user.account.info');
});



require __DIR__ . '/auth.php';
