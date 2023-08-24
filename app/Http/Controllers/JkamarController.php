<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jkamar;

class JkamarController extends Controller
{

    public function index()
    {
        $jkamar = Jkamar::all();
        return view('kamar.jkamar', compact('jkamar'));
    }

    public function store(Request $request)
    {
        $jkamar = new Jkamar;
        $jkamar->jenis_kamar = $request->jenis_kamar;
        $jkamar->harga_kamar = $request->harga_kamar;
        $jkamar->save();

        return response()->json(['message' => 'Jenis Kamar created successfully']);
    }

    public function update(Request $request, $id)
    {
        $jkamar = Jkamar::find($id);
        $jkamar->jenis_kamar = $request->jenis_kamar;
        $jkamar->harga_kamar = $request->harga_kamar;
        $jkamar->save();

        return response()->json(['message' => 'Jenis Kamar updated successfully']);
    }

    public function destroy($id)
    {
        $jkamar = Jkamar::find($id);
        $jkamar->delete();

        return response()->json(['message' => 'Jenis Kamar deleted successfully']);
    }
}
