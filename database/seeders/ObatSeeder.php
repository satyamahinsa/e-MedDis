<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obats = [
            ['JenisObat' => 'Antibiotik', 'NamaObat' => 'Amoxicillin'],
            ['JenisObat' => 'Analgesik', 'NamaObat' => 'Ibuprofen'],
            ['JenisObat' => 'Antipiretik', 'NamaObat' => 'Paracetamol'],
            ['JenisObat' => 'Antihistamin', 'NamaObat' => 'Cetirizine'],
            ['JenisObat' => 'Antifungal', 'NamaObat' => 'Fluconazole'],
            ['JenisObat' => 'Bronkodilator', 'NamaObat' => 'Salbutamol'],
            ['JenisObat' => 'Kortikosteroid', 'NamaObat' => 'Dexamethasone'],
            ['JenisObat' => 'Antivirus', 'NamaObat' => 'Acyclovir'],
            ['JenisObat' => 'Diuretik', 'NamaObat' => 'Furosemide'],
            ['JenisObat' => 'Antihipertensi', 'NamaObat' => 'Amlodipine'],
        ];

        foreach ($obats as $obat) {
            Obat::create([
                'JenisObat' => $obat['JenisObat'],
                'NamaObat' => $obat['NamaObat'],
            ]);
        }
    }
}
