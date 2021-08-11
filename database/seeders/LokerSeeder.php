<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LokerModel;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LokerModel::truncate();
        LokerModel::create([
            'jenis_loker' => 'Loker',
            'posisi' => 'Programmer',
            'bidang' => 'teknologi',
            'tgl_mulai' => '2021-08-1',
            'tgl_selesai' => '2021-08-29',
            'penempatan' => 'Madiun',
            'deskripsi' => 'Dibutuhkan Porgrammer untuk perusahaan rintisan (STartp up) satu satunya di kabupaten Ngawi yang bergerak dibidang teknologi dan infoirmasi. ANtara Lain Digital MArketing, Software Enginering, Security, etc',
            'perusahaan_id' => 1,
            'user_id' => 1,
        ]);
    }
}
