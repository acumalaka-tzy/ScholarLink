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
                'nama_beasiswa' => 'Beasiswa Unggulan',
                'deskripsi' => 'Beasiswa untuk mahasiswa berprestasi',
                'syarat' => 'IPK minimal 3.5',
                'benefit' => 'Biaya kuliah penuh',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-06-30',
                'tanggal_dibuat' => now(),
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}