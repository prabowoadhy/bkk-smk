<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LamaranModel;

class LamaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LamaranModel::truncate();
        LamaranModel::create([
            'id_loker' => 1,
            'id_pelamar' => 1,
            'catatan_pelamar' => 'Motivasi saya dalam melamar pekerjaan ini adalah sebagai ',
            'catatan_perusahaan' => '--',
            'status' => '-',
        ]);
    }
}
