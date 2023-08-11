<?php

use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index']);
Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('bookings/data', [BookingController::class, 'data'])->name('bookings.data');
Route::get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
