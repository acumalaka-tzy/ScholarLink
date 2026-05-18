<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        $providerUser = User::where('email', 'provider@gmail.com')->first();

        Provider::updateOrCreate(
            ['email_kontak' => 'google@gmail.com'],
            [
                'user_id' => $providerUser?->id,
                'nama_instansi' => 'Google Indonesia',
                'deskripsi_instansi' => 'Program beasiswa teknologi',
                'website' => 'https://google.com',
                'no_hp' => '08123456789',
                'alamat' => 'Jakarta',
            ]
        );

        Provider::updateOrCreate(
            ['email_kontak' => 'microsoft@gmail.com'],
            [
                'user_id' => null,
                'nama_instansi' => 'Microsoft Education',
                'deskripsi_instansi' => 'Program pendidikan global',
                'website' => 'https://microsoft.com',
                'no_hp' => '08111111111',
                'alamat' => 'Bandung',
            ]
        );
    }
}