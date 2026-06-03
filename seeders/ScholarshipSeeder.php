<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('scholarships')->insert([

            [
                'id_provider' => 1,
                'id_kategori' => 1,
                'nama_beasiswa' => 'Google Scholarship',
                'deskripsi' => 'Beasiswa teknologi dari Google',
                'syarat' => 'IPK minimal 3.5',
                'benefit' => 'Biaya kuliah penuh',
                'tipe' => 'Fully Funded',
                'deadline' => '2025-12-31',
                'tanggal_dibuat' => now(),
                'status' => 'aktif',
            ],

            [
                'id_provider' => 2,
                'id_kategori' => 2,
                'nama_beasiswa' => 'Microsoft Business Scholarship',
                'deskripsi' => 'Program bisnis internasional',
                'syarat' => 'Mahasiswa aktif',
                'benefit' => 'Biaya semester',
                'tipe' => 'Partial',
                'deadline' => '2025-11-20',
                'tanggal_dibuat' => now(),
                'status' => 'aktif',
            ],

        ]);
    }
}