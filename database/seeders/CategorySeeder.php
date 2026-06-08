<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Pemerintah', 'deskripsi' => 'Beasiswa yang diselenggarakan oleh lembaga pemerintah'],
            ['nama_kategori' => 'BUMN', 'deskripsi' => 'Beasiswa yang diselenggarakan oleh Badan Usaha Milik Negara'],
            ['nama_kategori' => 'Swasta', 'deskripsi' => 'Beasiswa yang diselenggarakan oleh pihak swasta atau yayasan'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['nama_kategori' => $category['nama_kategori']],
                ['deskripsi' => $category['deskripsi']]
            );
        }
    }
}