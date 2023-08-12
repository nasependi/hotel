<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingSecondController extends Controller
{
    public function index()
    {
        return view('bookings.index', [
            'bookings' => Booking::get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return back();
    }

    public function edit()
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return back();
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back();
    }
}
