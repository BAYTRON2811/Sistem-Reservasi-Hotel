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

        Route::resource('rooms', RoomController::class);

        Route::get('/dashboard',
            [AdminController::class,'dashboard'])
            ->name('admin.dashboard');

        Route::post('/booking/{booking}/confirm',
            [AdminController::class,'confirm'])
            ->name('admin.confirm');

        Route::post('/booking/{booking}/cancel',
            [AdminController::class,'cancel'])
            ->name('admin.cancel');
            
});
