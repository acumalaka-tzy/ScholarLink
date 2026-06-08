<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use App\Models\Provider;
use App\Models\Category;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        $scholarships = [
            ['nama' => 'KIP Kuliah', 'provider' => 'Puslapdik (Kemendikbud)', 'kategori' => 'Pemerintah', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-10-31', 'status' => 'aktif'],
            ['nama' => 'Beasiswa Unggulan', 'provider' => 'Puslapdik (Kemendikbud)', 'kategori' => 'Pemerintah', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-09-15', 'status' => 'ditutup'],
            ['nama' => 'ADik', 'provider' => 'Puslapdik (Kemendikbud)', 'kategori' => 'Pemerintah', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-08-20', 'status' => 'nonaktif'],
            ['nama' => 'BSI Scholarship', 'provider' => 'BSI Maslahat', 'kategori' => 'BUMN', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Partial', 'deadline' => '2026-09-30', 'status' => 'aktif'],
            ['nama' => 'Sobat Bumi', 'provider' => 'Pertamina Foundation', 'kategori' => 'BUMN', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-07-15', 'status' => 'ditutup'],
            ['nama' => 'Djarum Beasiswa Plus', 'provider' => 'Djarum Foundation', 'kategori' => 'Swasta', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Partial', 'deadline' => '2026-05-20', 'status' => 'nonaktif'],
            ['nama' => 'TELADAN Scholarship', 'provider' => 'Tanoto Foundation', 'kategori' => 'Swasta', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-08-30', 'status' => 'aktif'],
            ['nama' => 'Beasiswa KSE', 'provider' => 'Karya Salemba Empat', 'kategori' => 'Swasta', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Partial', 'deadline' => '2026-06-15', 'status' => 'ditutup'],
            ['nama' => 'Paragon Scholarship', 'provider' => 'ParagonCorp', 'kategori' => 'Swasta', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Partial', 'deadline' => '2026-10-01', 'status' => 'nonaktif'],
            ['nama' => 'CIMB ASEAN Scholarship', 'provider' => 'CIMB Niaga', 'kategori' => 'Swasta', 'deskripsi' => '...', 'syarat' => '...', 'benefit' => '...', 'tipe' => 'Fully Funded', 'deadline' => '2026-11-20', 'status' => 'aktif'],
        ];

        foreach ($scholarships as $s) {
            $provider = Provider::where('nama_instansi', $s['provider'])->first();
            $kategori = Category::where('nama_kategori', $s['kategori'])->first();

            if ($provider && $kategori) {
                Scholarship::updateOrCreate(
                    ['nama_beasiswa' => $s['nama']],
                    [
                        'id_provider'    => $provider->id_provider,
                        'id_kategori'    => $kategori->id_kategori,
                        'deskripsi'      => $s['deskripsi'],
                        'syarat'         => $s['syarat'],
                        'benefit'        => $s['benefit'],
                        'tipe'           => $s['tipe'],
                        'deadline'       => $s['deadline'],
                        'tanggal_dibuat' => now(),
                        'status'         => $s['status'] // Status diambil dari array di atas
                    ]
                );
            }
        }
    }
}