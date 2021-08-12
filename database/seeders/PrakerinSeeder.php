<?php

namespace Database\Seeders;

use App\Models\Prakerin;
use Illuminate\Database\Seeder;

class PrakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prakerin::truncate();
        Prakerin::create([
            'jenis_prakerin' => 'Part Time',
            'posisi' => 'Programmer',
            'bidang' => 'teknologi',
            'tgl_mulai' => '2021-08-1',
            'tgl_selesai' => '2021-08-29',
            'penempatan' => 'Madiun',
            'deskripsi' => 'Dibutuhkan Porgrammer untuk perusahaan rintisan (STartp up) satu satunya di kabupaten Ngawi yang bergerak dibidang teknologi dan infoirmasi. ANtara Lain Digital MArketing, Software Enginering, Security, etc',
            'slug' => 'programmer-teknologi-madiun-part-time',
            'perusahaan_id' => 1,
            'user_id' => 1,
        ]);
    }
}
