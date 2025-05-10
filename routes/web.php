<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Visitor\VisitorsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/login')->name('login.m');


Route::prefix('visitors')->group(function () {
    Route::get('/qr-code', [VisitorsController::class, 'generateQrCode'])->name('visitor.qr.code');
    Route::get('/welcome', [VisitorsController::class, 'scan'])->name('visitor.scan.des');
    Route::get('/welcome/check-in', [VisitorsController::class, 'validateSignature'])->name('visitor.manual.check.in');
    Route::get('/search', [VisitorsController::class, 'searchForVisitor'])->name('visitor.search');
    Route::post('/send-visit-request', [VisitorsController::class, 'sendVisitRequest'])->name('visitor.send.visit.request');
    Route::get('/pending-request/{visitor}', [VisitorsController::class, 'PendingVisitRequest'])->name('visitor.pending.request');
    Route::get('/{visitor}/details', [VisitorsController::class, 'show'])->name('visitor.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/user/{user}/account', [OrderController::class, 'getUserAccountInfo'])->name('user.account.info');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::post('/buyer-change', [AdminController::class, 'changeBuyer'])->name('buyer.change');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/visitors', [AdminController::class, 'visitors'])->name('visitors.index');
        Route::get('/visitors/request', [AdminController::class, 'getVisitorsRequest'])->name('visitors.request');
        Route::get('/visitors/created', [AdminController::class, 'createVisitor'])->name('visitors.create');
        Route::post('/visitors/store', [AdminController::class, 'storeVisitor'])->name('visitors.store');
        Route::get('/visitors/history', [AdminController::class, 'visitorsHistory'])->name('visitors.history');
        Route::patch('/visitors/{visitor}/accept', [AdminController::class, 'acceptVisitorRequest'])->name('visitors.request.accept');
        Route::patch('/visitors/{visitor}/reject', [AdminController::class, 'rejectVisitorRequest'])->name('visitors.request.reject');
    });

    Route::prefix('order')->group(function () {
        Route::get('/make-order', [OrderController::class, 'create'])->name('order.create');
        Route::post('/make-order', [OrderController::class, 'store'])->name('order.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
        Route::post('/orders/repeat', [OrderController::class, 'repeat'])->name('orders.repeat');
        Route::get('/orders/download', [OrderController::class, 'downloadOrders'])->name('orders.download');
        Route::post('/orders/message/{order}/send', [OrderController::class, 'sendMesssage'])->name('orders.message.sent');
        Route::get('/order/messages/{order}', [OrderController::class, 'getOrderMesssages'])->name('api.orders.messages');
    });


    Route::middleware('buyer')->prefix('buyer')->group(function () {
        Route::get('/recent-order', [BuyerController::class, 'getRecentOrderForBuyer'])->name('order.recent.index');
        Route::get('/m/dashboard', [BuyerController::class, 'getPendingOrderForBuyer'])->name('buyer.dashboard');
        Route::get('/m/history', [BuyerController::class, 'getBuyerOrderHistory'])->name('buyer.history.index');
        Route::patch('/update-order-item/{orderItem}', [OrderController::class, 'updateOrderItemStatus'])->name('buyer.update.order.item.status');
        Route::patch('/accept-order/{order}', [OrderController::class, 'acceptOrder'])->name('buyer.order.accept');
    });


    Route::middleware('user')->prefix('u')->group(function () {
        Route::get('/dashboard', [UserController::class, 'getPendingOrderForOwner'])->name('dashboard');
        Route::get('/history', [UserController::class, 'getOwnerOrderHistory'])->name('owner.history.index');
        Route::patch('/update-order/{order}', [OrderController::class, 'updateOrderStatus'])->name('owner.order.update');
        Route::get('/visitors', [UserController::class, 'getVisitorsForOwner'])->name('owner.visitors.index');
        Route::get('/visitors/history', [UserController::class, 'getUserVisitorsHistory'])->name('owner.visitors.history');
    });
});



require __DIR__ . '/auth.php';
