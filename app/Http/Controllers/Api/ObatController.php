<?php

namespace App\Http\Controllers\Api;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ObatResource;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::query();

        // Memeriksa apakah ada parameter pencarian no_antrian
        if ($request->has('id')) {
            $query->where('id', $request->id);
        }

        // Ambil data resep berdasarkan query yang telah dibuat
        $obats = $query->get();

        // Mengembalikan response dalam bentuk ResepResource
        return new ObatResource(true, 'List Data Obat', $obats);
    }
}
