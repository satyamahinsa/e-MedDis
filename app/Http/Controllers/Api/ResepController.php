<?php

namespace App\Http\Controllers\Api;

use App\Models\Resep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResepResource;

class ResepController extends Controller
{
    public function index(Request $request)
    {
        $query = Resep::query();

        // Memeriksa apakah ada parameter pencarian no_antrian
        if ($request->has('no_antrian')) {
            $query->where('no_antrian', $request->no_antrian);
        }

        // Memeriksa apakah ada parameter pencarian tanggal_lahir_pasien
        if ($request->has('tanggal_lahir_pasien')) {
            $query->where('tanggal_lahir_pasien', $request->tanggal_lahir_pasien);
        }

        // Ambil data resep berdasarkan query yang telah dibuat
        $reseps = $query->get();

        // Mengembalikan response dalam bentuk ResepResource
        return new ResepResource(true, 'List Data Resep', $reseps);
    }

    public function show(Resep $resep)
    {
        return new ResepResource(true, 'Data Resep Ditemukan!', $resep);
    }
}
