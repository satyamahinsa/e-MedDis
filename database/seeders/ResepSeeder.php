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
            ['no_antrian' => '1A', 'nik' => '3201041203980001'],
            ['no_antrian' => '2C', 'nik' => '3202011505920002'],
            ['no_antrian' => '3R', 'nik' => '3203012301800003'],
            ['no_antrian' => '4F', 'nik' => '3204050707750004'],
            ['no_antrian' => '5Q', 'nik' => '3205062806920005'],
            ['no_antrian' => '6H', 'nik' => '3206010912890006'],
            ['no_antrian' => '7W', 'nik' => '3207023004010007'],
            ['no_antrian' => '8A', 'nik' => '3208031711750008'],
            ['no_antrian' => '9P', 'nik' => '3209052512920009'],
            ['no_antrian' => '10N', 'nik' => '3210011105850010'],
        ];

        foreach ($reseps as $resep) {
            Resep::create([
                'no_antrian' => $resep['no_antrian'],
                'nik' => $resep['nik'],
            ]);
        }
    }
}
