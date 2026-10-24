<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil semua seeder utama secara terstruktur dan bersih
        $this->call([
            UserSeeder::class,
            MejaSeeder::class,
            MenuSeeder::class,
        ]);
    }
}