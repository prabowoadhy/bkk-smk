<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(AlumniSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(LokerSeeder::class);
        $this->call(LamaranSeeder::class);
        $this->call(PrakerinSeeder::class);
    }
}
