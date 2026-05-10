<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('users')->insert([
        [
            'name' => 'Admin', // Gunakan 'name', bukan 'nama'
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'aktif',
            'created_at' => now(), // Laravel standar menggunakan created_at
            'updated_at' => now(),
        ],
        [
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}