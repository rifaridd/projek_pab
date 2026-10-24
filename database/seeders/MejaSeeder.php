<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meja;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meja::insert([
            [
                'nomor_meja' => 1,
                'kapasitas'  => 2,
                'area'       => 'indoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 2,
                'kapasitas'  => 2,
                'area'       => 'indoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 3,
                'kapasitas'  => 2,
                'area'       => 'indoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 4,
                'kapasitas'  => 2,
                'area'       => 'indoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 5,
                'kapasitas'  => 4,
                'area'       => 'outdoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 6,
                'kapasitas'  => 4,
                'area'       => 'outdoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 7,
                'kapasitas'  => 4,
                'area'       => 'outdoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 8,
                'kapasitas'  => 4,
                'area'       => 'outdoor',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 9,
                'kapasitas'  => 8,
                'area'       => 'terrace',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 10,
                'kapasitas'  => 8,
                'area'       => 'terrace',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_meja' => 11,
                'kapasitas'  => 8,
                'area'       => 'terrace',
                'status'     => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}