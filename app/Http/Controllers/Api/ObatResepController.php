<?php

namespace App\Http\Controllers\Api;

use App\Models\ObatResep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ObatResepResource;

class ObatResepController extends Controller
{
    public function index(Request $request)
    {
        $query = ObatResep::query();

        // Memeriksa apakah ada parameter pencarian no_antrian
        if ($request->has('resep_id')) {
            $query->where('resep_id', $request->resep_id);
        }

        // Ambil data resep berdasarkan query yang telah dibuat
        $obat_reseps = $query->get();

        // Mengembalikan response dalam bentuk ResepResource
        return new ObatResepResource(true, 'List Data Obat Resep', $obat_reseps);
    }
}
