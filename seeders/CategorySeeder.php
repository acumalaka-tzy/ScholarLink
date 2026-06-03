<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([

            [
                'nama_kategori' => 'Teknologi',
                'deskripsi' => 'Beasiswa bidang teknologi'
            ],

            [
                'nama_kategori' => 'Bisnis',
                'deskripsi' => 'Beasiswa bidang bisnis'
            ],

            [
                'nama_kategori' => 'Kesehatan',
                'deskripsi' => 'Beasiswa bidang kesehatan'
            ],

        ]);
    }
}