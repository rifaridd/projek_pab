<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meja;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan nilai 'indoor' yang sudah terbukti valid pada enum database
        Meja::insert([
            [
                'nomor_meja' => 1,
                'kapasitas'  => 4,
                'area'       => 'indoor',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 2,
                'kapasitas'  => 2,
                'area'       => 'indoor',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 3,
                'kapasitas'  => 6,
                'area'       => 'indoor',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}