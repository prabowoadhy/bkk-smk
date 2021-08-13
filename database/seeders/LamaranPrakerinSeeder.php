<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LamaranPrakerin;

class LamaranPrakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LamaranPrakerin::truncate();
        LamaranPrakerin::create([
            'id_prakerin' => 1,
            'id_pelamar' => 1,
            'catatan_pelamar' => 'Motivasi saya dalam melamar pekerjaan ini adalah sebagai ',
            'catatan_perusahaan' => '--',
            'status' => '-',
        ]);
    }
}
