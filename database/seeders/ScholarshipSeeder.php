<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scholarships = [
            [
                'name' => 'Beasiswa Penuh S1 - Universitas Indonesia',
                'description' => 'Beasiswa penuh untuk program sarjana di Universitas Indonesia dengan benefit uang kuliah penuh dan uang hidup bulanan.',
                'university' => 'Universitas Indonesia',
                'location' => 'Jakarta',
                'level' => 's1',
                'field' => 'informatika',
                'benefit_amount' => 500000,
                'benefit_type' => 'Penuh + Hidup',
                'deadline' => now()->addMonths(3),
                'requirements' => 'IPK minimal 3.5, TOEFL minimal 500, Surat rekomendasi dari guru',
                'status' => 'active',
                'available_slots' => 50,
                'is_featured' => true,
            ],
            [
                'name' => 'Beasiswa Magister - Institut Teknologi Bandung',
                'description' => 'Program beasiswa pascasarjana dengan fokus pada penelitian dan pengembangan teknologi.',
                'university' => 'Institut Teknologi Bandung',
                'location' => 'Bandung',
                'level' => 's2',
                'field' => 'teknologi',
                'benefit_amount' => 750000,
                'benefit_type' => 'Penuh + Riset',
                'deadline' => now()->addMonths(4),
                'requirements' => 'IPK minimal 3.7, TOEFL minimal 550, Proposal penelitian',
                'status' => 'active',
                'available_slots' => 30,
                'is_featured' => true,
            ],
            [
                'name' => 'Beasiswa Kedokteran - Universitas Gadjah Mada',
                'description' => 'Beasiswa penuh untuk program studi kedokteran dengan kesempatan magang di rumah sakit terkemuka.',
                'university' => 'Universitas Gadjah Mada',
                'location' => 'Yogyakarta',
                'level' => 's1',
                'field' => 'kesehatan',
                'benefit_amount' => 600000,
                'benefit_type' => 'Penuh',
                'deadline' => now()->addMonths(2),
                'requirements' => 'IPK minimal 3.6, Nilai NEET minimal 500, Kesehatan fisik memenuhi standar',
                'status' => 'active',
                'available_slots' => 25,
                'is_featured' => false,
            ],
            [
                'name' => 'Beasiswa Ekonomi - Universitas Diponegoro',
                'description' => 'Program beasiswa untuk mahasiswa berprestasi di bidang ekonomi dan bisnis dengan fokus pengembangan kewirausahaan.',
                'university' => 'Universitas Diponegoro',
                'location' => 'Semarang',
                'level' => 's1',
                'field' => 'ekonomi',
                'benefit_amount' => 400000,
                'benefit_type' => 'Sebagian',
                'deadline' => now()->addMonths(5),
                'requirements' => 'IPK minimal 3.4, Surat pernyataan tidak mampu, Rekomendasi dari pihak sekolah',
                'status' => 'active',
                'available_slots' => 40,
                'is_featured' => false,
            ],
            [
                'name' => 'Beasiswa Internasional - ADB',
                'description' => 'Beasiswa dari Asian Development Bank untuk mahasiswa Asia Tenggara yang ingin melanjutkan studi ke luar negeri.',
                'university' => 'Partner Universities Internasional',
                'location' => 'Berbagai negara',
                'level' => 's2',
                'field' => 'umum',
                'benefit_amount' => 1500000,
                'benefit_type' => 'Penuh',
                'deadline' => now()->addMonths(6),
                'requirements' => 'IPK minimal 3.8, TOEFL minimal 600, Surat motivasi kuat',
                'status' => 'active',
                'available_slots' => 15,
                'is_featured' => true,
            ],
            [
                'name' => 'Beasiswa Hukum - Universitas Airlangga',
                'description' => 'Program beasiswa untuk calon akademisi dan praktisi hukum dengan prestasi akademik dan non-akademik yang luar biasa.',
                'university' => 'Universitas Airlangga',
                'location' => 'Surabaya',
                'level' => 's1',
                'field' => 'hukum',
                'benefit_amount' => 450000,
                'benefit_type' => 'Penuh',
                'deadline' => now()->addMonths(3),
                'requirements' => 'IPK minimal 3.5, Aktif di organisasi, Rekomendasi 2 guru',
                'status' => 'active',
                'available_slots' => 20,
                'is_featured' => false,
            ],
            [
                'name' => 'Beasiswa Pendidikan - Kementeri Riset Pendidikan',
                'description' => 'Program beasiswa nasional untuk mahasiswa berprestasi di semua jenjang pendidikan dengan komitmen mengajar setelah lulus.',
                'university' => 'Universitas Pendidikan Indonesia',
                'location' => 'Bandung',
                'level' => 's1',
                'field' => 'pendidikan',
                'benefit_amount' => 500000,
                'benefit_type' => 'Penuh + Hidup',
                'deadline' => now()->addMonths(2),
                'requirements' => 'IPK minimal 3.5, Komitmen mengajar minimal 5 tahun, Surat motivasi',
                'status' => 'active',
                'available_slots' => 35,
                'is_featured' => true,
            ],
        ];

        foreach ($scholarships as $scholarship) {
            Scholarship::create($scholarship);
        }
    }
}
