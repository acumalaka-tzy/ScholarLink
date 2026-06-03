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
        // Ambil ID secara dinamis (Aman, tidak akan error kalau ID berubah)
        $googleId = Provider::where('nama_instansi', 'Google Indonesia')->value('id_provider');
        $msId = Provider::where('nama_instansi', 'Microsoft Education')->value('id_provider');
        
        $catTek = Category::where('nama_kategori', 'Teknologi')->value('id_kategori');
        $catBis = Category::where('nama_kategori', 'Bisnis')->value('id_kategori');
        $catKes = Category::where('nama_kategori', 'Kesehatan')->value('id_kategori');

        $data = [
            // Kategori Teknologi (Google)
            ['Beasiswa Kominfo', 'Program pelatihan kompetensi digital intensif.', 'Mahasiswa S1 aktif, CV, transkrip.', 'Sertifikasi Global', 'Fully Funded', '2026-12-31', $googleId, $catTek],
            ['Google Career Certificates', 'Sertifikasi profesional bidang data & IT.', 'Mahasiswa S1, surat rekomendasi dosen.', 'Sertifikat Industri', 'Partial', '2026-10-30', $googleId, $catTek],
            ['XL Axiata Future Leaders', 'Pengembangan leadership dan digital skill.', 'Semester 1-3, IPK 3.00.', 'Mentoring Industri', 'Fully Funded', '2026-08-15', $googleId, $catTek],
            ['DataPrint', 'Bantuan biaya pendidikan untuk mahasiswa.', 'Aktif organisasi, esai singkat.', 'Dana Tunai', 'Partial', '2026-09-30', $googleId, $catTek],
            ['AWS Academy', 'Pelatihan Cloud Computing tingkat lanjut.', 'Lulus tes dasar IT.', 'Voucher Sertifikasi', 'Partial', '2026-11-20', $googleId, $catTek],

            // Kategori Bisnis (Microsoft)
            ['Djarum Beasiswa Plus', 'Pengembangan leadership dan soft skill.', 'Semester IV, IPK 3.00.', 'Uang saku, pelatihan', 'Partial', '2026-05-20', $msId, $catBis],
            ['GenBI', 'Beasiswa Bank Indonesia dengan komunitas.', 'IPK 3.25, aktif organisasi.', 'Uang saku, komunitas', 'Partial', '2026-07-10', $msId, $catBis],
            ['Bakti BCA', 'Dukungan biaya pendidikan.', 'Semester IV, IPK 3.00.', 'Biaya kuliah', 'Partial', '2026-09-01', $msId, $catBis],
            ['CIMB Niaga', 'Beasiswa untuk mahasiswa S1.', 'IPK 3.25, esai ekonomi.', 'Biaya kuliah & skripsi', 'Partial', '2026-10-15', $msId, $catBis],
            ['Tanoto Foundation', 'Program pengembangan kepemimpinan.', 'Semester 1, prestasi & organisasi.', 'Biaya kuliah & hidup', 'Fully Funded', '2026-08-30', $msId, $catBis],

            // Kategori Kesehatan (Microsoft)
            ['Sobat Bumi', 'Beasiswa bagi mahasiswa peduli lingkungan.', 'IPK 3.00, proyek lingkungan.', 'Uang saku, riset', 'Fully Funded', '2026-07-30', $msId, $catKes],
            ['Beasiswa Unggulan', 'Beasiswa penuh Kemendikbud.', 'Sertifikat prestasi, KTP.', 'Biaya kuliah & buku', 'Fully Funded', '2026-08-20', $msId, $catKes],
            ['Karya Salemba Empat', 'Beasiswa bagi mahasiswa berprestasi.', 'Tidak sedang menerima beasiswa lain.', 'Uang saku bulanan', 'Partial', '2026-06-15', $msId, $catKes],
            ['Beasiswa Medis', 'Ikatan dinas RS mitra.', 'Tingkat akhir Kedokteran.', 'Biaya praktik klinis', 'Partial', '2026-11-01', $msId, $catKes],
            ['Riset Kesehatan', 'Bantuan dana penelitian.', 'Proposal penelitian, transkrip.', 'Dana bantuan riset', 'Partial', '2026-12-01', $msId, $catKes],
        ];

        foreach ($data as $item) {
            Scholarship::updateOrCreate(
                ['nama_beasiswa' => $item[0]],
                [
                    'deskripsi'      => $item[1],
                    'syarat'         => $item[2],
                    'benefit'        => $item[3],
                    'tipe'           => $item[4],
                    'deadline'       => $item[5],
                    'id_provider'    => $item[6],
                    'id_kategori'    => $item[7],
                    'tanggal_dibuat' => now(),
                    'status'         => 'aktif'
                ]
            );
        }
    }
}