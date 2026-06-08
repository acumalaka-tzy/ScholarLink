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

        $providers = [
            ['email' => 'puslapdik@kemdikbud.go.id', 'nama' => 'Puslapdik (Kemendikbud)', 'web' => 'https://puslapdik.kemendikbud.go.id/', 'hp' => '021-5703303', 'alamat' => 'Jakarta'],
            ['email' => 'info@bsimaslahat.or.id', 'nama' => 'BSI Maslahat', 'web' => 'https://www.bsimaslahat.or.id/', 'hp' => '021-82420100', 'alamat' => 'Jakarta'],
            ['email' => 'info@pertaminafoundation.org', 'nama' => 'Pertamina Foundation', 'web' => 'https://pertaminafoundation.org/', 'hp' => '021-7221191', 'alamat' => 'Jakarta'],
            ['email' => 'info@djarumbeasiswaplus.org', 'nama' => 'Djarum Foundation', 'web' => 'https://djarumbeasiswaplus.org/', 'hp' => '021-334933', 'alamat' => 'Kudus'],
            ['email' => 'info@tanotofoundation.org', 'nama' => 'Tanoto Foundation', 'web' => 'https://www.tanotofoundation.org/', 'hp' => '021-3927121', 'alamat' => 'Jakarta'],
            ['email' => 'info@kse.or.id', 'nama' => 'Karya Salemba Empat', 'web' => 'https://kse.or.id/', 'hp' => '021-72782335', 'alamat' => 'Jakarta'],
            ['email' => 'info@paragon-innovation.com', 'nama' => 'ParagonCorp', 'web' => 'https://www.paragon-innovation.com/', 'hp' => '021-5849070', 'alamat' => 'Tangerang'],
            ['email' => 'care@cimbniaga.co.id', 'nama' => 'CIMB Niaga', 'web' => 'https://www.cimbniaga.co.id/', 'hp' => '14041', 'alamat' => 'Jakarta'],
        ];

        foreach ($providers as $p) {
            Provider::updateOrCreate(
                ['email_kontak' => $p['email']],
                [
                    'user_id' => $providerUser?->id,
                    'nama_instansi' => $p['nama'],
                    'deskripsi_instansi' => 'Penyelenggara program beasiswa pendidikan tinggi.',
                    'website' => $p['web'],
                    'no_hp' => $p['hp'],
                    'alamat' => $p['alamat'],
                ]
            );
        }
    }
}