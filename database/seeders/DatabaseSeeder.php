<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'no_hp' => '081234567890',
            'no_ktp' => '1234567890123456',
            'alamat' => 'Jl. Nangka',
            'role' => 'Admin',
        ]);
    }
}
