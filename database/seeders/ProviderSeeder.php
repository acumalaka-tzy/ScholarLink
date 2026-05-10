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
                'nama_instansi' => 'Google Indonesia',
                'deskripsi_instansi' => 'Program beasiswa teknologi',
                'website' => 'https://google.com',
                'email_kontak' => 'google@gmail.com',
                'no_hp' => '08123456789',
                'alamat' => 'Jakarta',
            ],

            [
                'nama_instansi' => 'Microsoft Education',
                'deskripsi_instansi' => 'Program pendidikan global',
                'website' => 'https://microsoft.com',
                'email_kontak' => 'microsoft@gmail.com',
                'no_hp' => '08111111111',
                'alamat' => 'Bandung',
            ],

        ]);
    }
}