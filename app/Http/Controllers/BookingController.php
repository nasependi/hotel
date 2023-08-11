<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::select(['id', 'no_kamar', 'nama_kamar', 'checkin', 'checkout', 'created_at', 'updated_at']);

            return DataTables::of($data)
                ->addColumn('actions', function ($booking) {
                    $editUrl = route('bookings.edit', ['booking' => $booking->id]);
                    $deleteUrl = route('bookings.destroy', ['booking' => $booking->id]);

                    $actions = '<a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>';
                    $actions .= '<form action="' . $deleteUrl . '" method="post" style="display: inline;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                                </form>';

                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return abort(403);
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $booking = Booking::create($request->all());
        return response()->json(['message' => 'Booking added successfully', 'booking' => $booking]);
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}

