<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
                'name' => 'Admin ScholarLink',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
        ]);

        User::create([
                'name' => 'Budi Mahasiswa',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
        ]);

        User::create([
                'name' => 'Provider Scholarship',
                'email' => 'provider@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'provider',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
        ]);
    }
}