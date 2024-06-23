<?php

namespace Database\Seeders;

use App\Models\Resep;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reseps = [
            ['no_antrian' => '1A', 'tanggal_lahir_pasien' => '1990-01-15'],
            ['no_antrian' => '2C', 'tanggal_lahir_pasien' => '1985-06-24'],
            ['no_antrian' => '3R', 'tanggal_lahir_pasien' => '2000-03-12'],
            ['no_antrian' => '4F', 'tanggal_lahir_pasien' => '1992-07-30'],
            ['no_antrian' => '5Q', 'tanggal_lahir_pasien' => '1978-11-22'],
            ['no_antrian' => '6H', 'tanggal_lahir_pasien' => '2001-09-05'],
            ['no_antrian' => '7W', 'tanggal_lahir_pasien' => '1988-04-17'],
            ['no_antrian' => '8A', 'tanggal_lahir_pasien' => '1995-12-25'],
            ['no_antrian' => '9P', 'tanggal_lahir_pasien' => '1991-02-14'],
            ['no_antrian' => '10N', 'tanggal_lahir_pasien' => '1998-08-09'],
        ];

        foreach ($reseps as $resep) {
            Resep::create([
                'no_antrian' => $resep['no_antrian'],
                'tanggal_lahir_pasien' => $resep['tanggal_lahir_pasien'],
            ]);
        }
    }
}
