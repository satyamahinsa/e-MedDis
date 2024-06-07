<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;


class ObatController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'NamaObat' => 'required',
            'JenisObat' => 'required',
        ]);

        Obat::create($request->all());
        //return redirect()->route('obat.index')->with('success', 'Obat created successfully.');
    }

    // Method to get all Obat data
    public function getall()
    {
        $obats = Obat::all();
        return response()->json($obats);
    }
}
