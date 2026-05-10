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
        'nama' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'status' => 'aktif',
        'tanggal_daftar' => now(),
    ],

    [
        'nama' => 'Budi',
        'email' => 'budi@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'user',
        'status' => 'aktif',
        'tanggal_daftar' => now(),
    ],

    [
        'nama' => 'Siti',
        'email' => 'siti@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'user',
        'status' => 'aktif',
        'tanggal_daftar' => now(),
    ],

    ]);
    }
}