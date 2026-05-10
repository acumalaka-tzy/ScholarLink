<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('providers')->insert([
            [
                'nama_instansi' => 'Kemendikbud',
                'deskripsi_instansi' => 'Penyedia beasiswa pendidikan nasional',
                'website' => 'https://kemendikbud.go.id',
                'email_kontak' => 'kemendikbud@gmail.com',
                'no_hp' => '08123456789',
                'alamat' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_instansi' => 'Bank Indonesia',
                'deskripsi_instansi' => 'Program Beasiswa Generasi Baru Indonesia',
                'website' => 'https://bi.go.id',
                'email_kontak' => 'beasiswa@bi.go.id',
                'no_hp' => '082233445566',
                'alamat' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}