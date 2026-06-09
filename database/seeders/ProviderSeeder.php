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
        $bsiUser = User::where('email', 'provider_bsi@gmail.com')->first();

        $providers = [
            [
                'email' => 'puslapdik@kipk.go.id',
                'nama' => 'Puslapdik (Kip Kuliah)',
                'web' => 'https://kip-kuliah.kemdiktisaintek.go.id/',
                'hp' => '021-5703303',
                'alamat' => 'Jakarta',
                'user_id' => $providerUser?->id, // cuma KIP Kuliah
            ],
            [
                'email' => 'puslapdik@bu.go.id',
                'nama' => 'Puslapdik (Beasiswa Unggulan)',
                'web' => 'https://beasiswaunggulan.kemendikdasmen.go.id/',
                'hp' => '021-7703303',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
            [
                'email' => 'puslapdik@adik.go.id',
                'nama' => 'Puslapdik (ADik)',
                'web' => 'https://adik.kemdiktisaintek.go.id/',
                'hp' => '021-9703303',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
            [
                'email' => 'info@bsimaslahat.or.id',
                'nama' => 'BSI Maslahat',
                'web' => 'https://www.bsischolarship.id/bsi-scholarship',
                'hp' => '021-82420100',
                'alamat' => 'Jakarta',
                'user_id' => $bsiUser?->id,
            ],
            [
                'email' => 'info@pertaminafoundation.org',
                'nama' => 'Pertamina Foundation',
                'web' => 'https://pertaminafoundation.org/',
                'hp' => '021-7221191',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
            [
                'email' => 'info@djarumbeasiswaplus.org',
                'nama' => 'Djarum Foundation',
                'web' => 'https://djarumbeasiswaplus.org/',
                'hp' => '021-334933',
                'alamat' => 'Kudus',
                'user_id' => null,
            ],
            [
                'email' => 'info@tanotofoundation.org',
                'nama' => 'Tanoto Foundation',
                'web' => 'https://www.tanotofoundation.org/',
                'hp' => '021-3927121',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
            [
                'email' => 'info@kse.or.id',
                'nama' => 'Karya Salemba Empat',
                'web' => 'https://kse.or.id/',
                'hp' => '021-72782335',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
            [
                'email' => 'info@paragon-innovation.com',
                'nama' => 'ParagonCorp',
                'web' => 'https://www.paragon-innovation.com/scholarship',
                'hp' => '021-5849070',
                'alamat' => 'Tangerang',
                'user_id' => null,
            ],
            [
                'email' => 'care@cimbniaga.co.id',
                'nama' => 'CIMB Niaga',
                'web' => 'https://www.cimbniaga.co.id/id/kejar-mimpi/beasiswa-cimb-niaga',
                'hp' => '14041',
                'alamat' => 'Jakarta',
                'user_id' => null,
            ],
        ];

        foreach ($providers as $p) {
            Provider::updateOrCreate(
                ['email_kontak' => $p['email']],
                [
                    'user_id' => $p['user_id'],
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