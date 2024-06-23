<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\ObatResep;
use Illuminate\Database\Seeder;

class ObatResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obat_reseps = [
            ['obat_id' => 1, 'resep_id' => 1, 'jumlah' => 10],
            ['obat_id' => 2, 'resep_id' => 2, 'jumlah' => 15],
            ['obat_id' => 3, 'resep_id' => 3, 'jumlah' => 20],
            ['obat_id' => 4, 'resep_id' => 4, 'jumlah' => 5],
            ['obat_id' => 5, 'resep_id' => 5, 'jumlah' => 12],
            ['obat_id' => 6, 'resep_id' => 6, 'jumlah' => 18],
            ['obat_id' => 7, 'resep_id' => 7, 'jumlah' => 7],
            ['obat_id' => 8, 'resep_id' => 8, 'jumlah' => 25],
            ['obat_id' => 9, 'resep_id' => 9, 'jumlah' => 8],
            ['obat_id' => 10, 'resep_id' => 10, 'jumlah' => 14],
        ];

        foreach ($obat_reseps as $obat_resep) {
            $obat = Obat::find($obat_resep['obat_id']);
            $resep = Resep::find($obat_resep['resep_id']);
            $resep->obats()->attach($obat->id, ['jumlah' => $obat_resep['jumlah']]);
        }
    }
}
