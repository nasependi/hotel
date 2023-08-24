<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingSecondController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\JkamarController;
use App\Http\Controllers\Layout;
use Illuminate\Support\Facades\Route; // Perhatikan penggunaan Illuminate\Support\Facades\Route

Route::get('/', [Layout::class, 'home']);

Route::prefix('layout')->group(function () { // Menggunakan prefix() untuk grup rute layout
    Route::get('/home', [Layout::class, 'home']);
    Route::get('/index', [Layout::class, 'index']);
});


Route::controller(BookingSecondController::class)->group(function() {
    Route::get('booking', 'index');
    Route::post('booking', 'store');
    Route::put('booking/{booking}', 'update');
    Route::delete('booking/{booking}', 'destroy');
});

Route::resource('kamar', KamarController::class);

Route::resource('jkamar', JkamarController::class);

