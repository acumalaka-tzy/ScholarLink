<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin ScholarLink', 
                'email' => 'admin@gmail.com', 
                'password' => 'password', 
                'role' => 'admin', 
                'status' => 'aktif', 
                'tanggal_daftar' => now(),
                'email_verified_at' => now()
            ],
            [
                'name' => 'Budi Mahasiswa', 
                'email' => 'budi@gmail.com', 
                'password' => 'password', 
                'role' => 'mahasiswa', 
                'status' => 'aktif', 
                'tanggal_daftar' => now(),
                'email_verified_at' => now()
            ],
            [
                'name' => 'Provider Scholarship', 
                'email' => 'provider@gmail.com', 
                'password' => 'password', 
                'role' => 'provider', 
                'status' => 'aktif', 
                'tanggal_daftar' => now(),
                'email_verified_at' => now()
            ],
            [
                'name' => 'Provider BSI', 
                'email' => 'provider_bsi@gmail.com', 
                'password' => 'password', 
                'role' => 'provider', 
                'status' => 'aktif', 
                'tanggal_daftar' => now(),
                'email_verified_at' => now()
                ],
        ];

        foreach ($users as $user) {
            \App\Models\User::updateOrCreate(
                ['email' => $user['email']], // Syarat unik
                $user // Data yang dimasukkan
            );
        }
    }
}