<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed default User untuk akun tamu / pengujian
        User::create([
            'nama' => 'Lumiere Guest',
            'email' => 'guest@lumiere.com',
            'no_hp' => '081234567890',
            'password' => Hash::make('password'),
        ]);
    }
}