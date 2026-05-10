<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name' => 'Admin ScholarLink',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
            ],

            [
                'name' => 'Budi Mahasiswa',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
            ],

            [
                'name' => 'Provider Scholarship',
                'email' => 'provider@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'provider',
                'status' => 'aktif',
                'tanggal_daftar' => now(),
            ],

        ]);
    }
}