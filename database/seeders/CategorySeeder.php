<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Teknologi', 'deskripsi' => 'Beasiswa bidang teknologi'],
            ['nama_kategori' => 'Bisnis', 'deskripsi' => 'Beasiswa bidang bisnis'],
            ['nama_kategori' => 'Kesehatan', 'deskripsi' => 'Beasiswa bidang kesehatan'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['nama_kategori' => $category['nama_kategori']], // Cek berdasarkan nama
                ['deskripsi' => $category['deskripsi']]          // Update/Insert deskripsinya
            );
        }
    }
}