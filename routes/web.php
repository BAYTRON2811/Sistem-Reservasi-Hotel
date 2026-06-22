<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
require __DIR__.'/auth.php';

Route::get('/', [RoomController::class, 'index'])->name('rooms.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/booking/{room}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/my-bookings', [BookingController::class, 'myBookings'])
        ->name('booking.history');
});
Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('rooms', RoomController::class)->names('admin.rooms');

        Route::get('/dashboard',
            [AdminController::class,'dashboard'])
            ->name('admin.dashboard');

        Route::post('/booking/{booking}/confirm',
            [AdminController::class,'confirm'])
            ->name('admin.confirm');

        Route::post('/booking/{booking}/checkin',
            [AdminController::class,'checkin'])
            ->name('admin.checkin');

        Route::post('/booking/{booking}/cancel',
            [AdminController::class,'cancel'])
            ->name('admin.cancel');

        Route::get('/occupied-rooms',
            [AdminController::class, 'occupiedRooms'])
            ->name('admin.occupied');

        Route::post('/booking/{booking}/checkout',
            [AdminController::class, 'checkout'])
            ->name('admin.checkout');
            
});
Route::get('/make-admin', function () {

    $user = \App\Models\User::where(
        'email',
        'joshuakristanto11@gmail.com'
    )->first();

    if ($user) {
        $user->role = 'admin';
        $user->save();
    }

    return 'Admin berhasil dibuat';
});