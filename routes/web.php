<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Layout;
use Illuminate\Support\Facades\Route; // Perhatikan penggunaan Illuminate\Support\Facades\Route

Route::get('/', [Layout::class, 'home']);

Route::prefix('layout')->group(function () { // Menggunakan prefix() untuk grup rute layout
    Route::get('/home', [Layout::class, 'home']);
    Route::get('/index', [Layout::class, 'index']);
});

Route::get('/bookings/index', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/bookings/data', [BookingController::class, 'data'])->name('bookings.data');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
