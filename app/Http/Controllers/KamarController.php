<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        $kamar = new Kamar;
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->jenis_kamar = $request->jenis_kamar;
        $kamar->save();

        return response()->json(['message' => 'Kamar created successfully']);
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->jenis_kamar = $request->jenis_kamar;
        $kamar->save();

        return response()->json(['message' => 'Kamar updated successfully']);
    }

    public function destroy($id)
    {
        $kamar = Kamar::find($id);
        $kamar->delete();

        return response()->json(['message' => 'Kamar deleted successfully']);
    }
}