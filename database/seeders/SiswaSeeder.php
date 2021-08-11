<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::truncate();
        Siswa::create([
            'nama' => 'Siswa 1',
            'nis' => '11222111',
            'level' => 'siswa',
            'no_telp' => '0855261627373',
            'email' => 'siswa@mail.com',
            'password' => bcrypt('siswa'),
            'remember_token' => Str::random(60),
        ]);
    }
}
