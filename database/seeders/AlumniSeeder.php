<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumni::truncate();
        Alumni::create([
            'name' => 'Alumni 1',
            'nik' => '11222111',
            'level' => 'alumni',
            'email' => 'alumni@mail.com',
            'password' => bcrypt('alumni'),
            'remember_token' => Str::random(60),
        ]);
    }
}
