<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    public function index()
    {
        return view('prices.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Price::select(['id', 'room_type', 'low_session', 'high_session', 'peak_session', 'created_at', 'updated_at']);

            return DataTables::of($data)
                ->addColumn('actions', function ($price) {
                    $editUrl = route('prices.edit', ['price' => $price->id]);
                    $deleteUrl = route('prices.destroy', ['price' => $price->id]);

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
        return view('prices.create');
    }

    public function store(Request $request)
    {
        $price = Price::create($request->all());
        return response()->json(['message' => 'Price added successfully', 'price' => $price]);
    }

    public function edit(Price $price)
    {
        return view('prices.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return response()->json(['message' => 'Price updated successfully', 'price' => $price]);
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json(['message' => 'Price deleted successfully']);
    }
}

