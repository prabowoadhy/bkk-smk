<?php

namespace Database\Seeders;

use App\Models\PerusahaanModel;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PerusahaanModel::truncate();
        PerusahaanModel::create([
            'nama_perusahaan' => 'Sigmatec',
            'alamat' => 'Karangasri Ngawi',
            'bidang_jasa' => 'teknologi',
            'deskripsi' => 'Sebuah perusahaan rintisan (STartp up) satu satunya di kabupaten Ngawi yang bergerak dibidang teknologi dan infoirmasi. ANtara Lain Digital MArketing, Software Enginering, Security, etc',
            'no_telp' => '09900212323',
            'email' => 'alumni@mail.com',
            'user_id' => 1,
            'slug' => 'sigmatec',
        ]);
    }
}
