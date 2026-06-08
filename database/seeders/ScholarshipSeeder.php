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
            [
                'nama' => 'KIP Kuliah',
                'provider' => 'Puslapdik (Kip Kuliah)',
                'kategori' => 'Pemerintah',
                'deskripsi' => 'KIP Kuliah merupakan program bantuan pendidikan dari pemerintah bagi lulusan SMA/SMK/sederajat yang memiliki potensi akademik baik namun memiliki keterbatasan ekonomi. Program ini memberikan akses pendidikan tinggi melalui pembiayaan kuliah dan bantuan biaya hidup selama masa studi.',
                'syarat' => 'Warga Negara Indonesia; Lulusan SMA/SMK/sederajat; Memiliki keterbatasan ekonomi yang dibuktikan sesuai ketentuan program; Diterima pada perguruan tinggi dan program studi yang memenuhi persyaratan KIP Kuliah',
                'benefit' => 'Pembebasan biaya pendidikan (UKT/SPP) sesuai ketentuan dan bantuan biaya hidup selama masa studi berdasarkan klaster wilayah perguruan tinggi',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-10-31',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Beasiswa Unggulan',
                'provider' => 'Puslapdik (Beasiswa Unggulan)',
                'kategori' => 'Pemerintah',
                'deskripsi' => 'Beasiswa Unggulan adalah program pembiayaan pendidikan dari pemerintah yang ditujukan bagi masyarakat berprestasi untuk melanjutkan studi pada jenjang sarjana, magister, dan doktor. Program ini bertujuan meningkatkan kualitas sumber daya manusia Indonesia yang unggul dan berdaya saing.',
                'syarat' => 'Memiliki prestasi akademik atau non-akademik; Telah diterima atau sedang menempuh pendidikan pada perguruan tinggi yang memenuhi ketentuan program; Memenuhi persyaratan administrasi seperti surat rekomendasi dan dokumen pendukung lainnya',
                'benefit' => 'Biaya pendidikan; Dukungan biaya penunjang akademik sesuai ketentuan program; Serta pendampingan selama masa studi',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-09-15',
                'status' => 'ditutup'
            ],

            [
                'nama' => 'ADik',
                'provider' => 'Puslapdik (ADik)',
                'kategori' => 'Pemerintah',
                'deskripsi' => 'Afirmasi Pendidikan Tinggi (ADik) merupakan program bantuan pendidikan yang ditujukan bagi putra-putri daerah khusus, wilayah 3T, Papua, anak repatriasi, dan kelompok sasaran afirmasi lainnya agar memperoleh akses pendidikan tinggi yang lebih merata.',
                'syarat' => 'Terdaftar pada sistem ADik; lulus seleksi masuk perguruan tinggi yang ditetapkan; Melampirkan dokumen identitas dan persyaratan administrasi; Tidak sedang menerima beasiswa pemerintah lain yang sejenis',
                'benefit' => 'Pembiayaan biaya pendidikan (UKT); Bantuan biaya hidup; Serta dukungan keberlanjutan studi selama menjadi penerima program',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-08-20',
                'status' => 'nonaktif'
            ],

            [
                'nama' => 'BSI Scholarship',
                'provider' => 'BSI Maslahat',
                'kategori' => 'BUMN',
                'deskripsi' => 'BSI Scholarship merupakan program pengembangan mahasiswa yang diselenggarakan oleh BSI Maslahat untuk mendukung mahasiswa berprestasi dan memiliki potensi kepemimpinan melalui bantuan pendidikan, pembinaan karakter, dan penguatan kompetensi diri.',
                'syarat' => 'Mahasiswa aktif jenjang S1; Memiliki prestasi akademik yang baik; Aktif dalam organisasi atau kegiatan sosial; Tidak sedang menerima beasiswa sejenis; Memenuhi ketentuan administrasi yang ditetapkan program',
                'benefit' => 'Bantuan dana pendidikan; Pembinaan kepemimpinan; Pelatihan pengembangan diri; Mentoring; Serta kesempatan bergabung dalam komunitas penerima beasiswa',
                'tipe' => 'Partial',
                'deadline' => '2026-09-30',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Sobat Bumi',
                'provider' => 'Pertamina Foundation',
                'kategori' => 'BUMN',
                'deskripsi' => 'Beasiswa Sobat Bumi merupakan program Pertamina Foundation yang ditujukan bagi mahasiswa berprestasi yang memiliki kepedulian terhadap lingkungan, energi berkelanjutan, dan kegiatan sosial kemasyarakatan.',
                'syarat' => 'WNI; Mahasiswa aktif minimal semester 2; IPK minimal sekitar 3.00; Aktif berorganisasi atau kegiatan sosial; Tidak sedang menerima beasiswa lain; Tidak pernah terlibat tindak kriminal atau penyalahgunaan narkoba',
                'benefit' => 'Bantuan biaya pendidikan (UKT/SPP); Bantuan biaya hidup bulanan; Program capacity building; Character building; Serta jaringan nasional Sobat Bumi dan Pertamina Foundation',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-07-15',
                'status' => 'ditutup'
            ],

            [
                'nama' => 'Djarum Beasiswa Plus',
                'provider' => 'Djarum Foundation',
                'kategori' => 'Swasta',
                'deskripsi' => 'Djarum Beasiswa Plus merupakan program beasiswa prestasi yang tidak hanya memberikan bantuan dana pendidikan, tetapi juga fokus pada pengembangan soft skills, kepemimpinan, karakter, dan wawasan kebangsaan.',
                'syarat' => 'Mahasiswa S1/D4 semester 4; IPK minimal 3.00; Aktif berorganisasi; Tidak sedang menerima beasiswa lain; Berasal dari perguruan tinggi mitra Djarum Foundation',
                'benefit' => 'Dana beasiswa selama satu tahun; Pelatihan kepemimpinan; Character building; Nation building; Community empowerment; Networking nasional; Pengembangan soft skills',
                'tipe' => 'Partial',
                'deadline' => '2026-05-20',
                'status' => 'nonaktif'
            ],

            [
                'nama' => 'TELADAN Scholarship',
                'provider' => 'Tanoto Foundation',
                'kategori' => 'Swasta',
                'deskripsi' => 'TELADAN (Transformasi Edukasi untuk Melahirkan Pemimpin Masa Depan) merupakan program unggulan Tanoto Foundation yang menggabungkan dukungan finansial dengan pengembangan kepemimpinan secara berkelanjutan bagi mahasiswa berprestasi.',
                'syarat' => 'Mahasiswa S1 pada perguruan tinggi mitra Tanoto Foundation; Memiliki prestasi akademik baik; Menunjukkan potensi kepemimpinan; Aktif dalam kegiatan organisasi atau sosial; Memenuhi persyaratan administrasi program',
                'benefit' => 'Dukungan biaya kuliah; Tunjangan hidup; Pelatihan kepemimpinan; Mentoring; Pengembangan karier; Community project; Akses jaringan Tanoto Scholars',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-08-30',
                'status' => 'aktif'
            ],

            [
                'nama' => 'Beasiswa KSE',
                'provider' => 'Karya Salemba Empat',
                'kategori' => 'Swasta',
                'deskripsi' => 'Beasiswa Karya Salemba Empat (KSE) adalah program bantuan pendidikan bagi mahasiswa berprestasi yang juga memberikan pembinaan karakter, pelatihan, dan pengembangan kompetensi untuk meningkatkan kesiapan karier.',
                'syarat' => 'Mahasiswa aktif program S1; Memiliki prestasi akademik yang baik; Membuat Essay; Aktif dalam kegiatan kemahasiswaan; Tidak sedang menerima beasiswa lain yang sejenis',
                'benefit' => 'Tunjangan beasiswa bulanan; Pelatihan pengembangan diri',
                'tipe' => 'Partial',
                'deadline' => '2026-06-15',
                'status' => 'ditutup'
            ],

            [
                'nama' => 'Paragon Scholarship',
                'provider' => 'ParagonCorp',
                'kategori' => 'Swasta',
                'deskripsi' => 'Paragon Scholarship merupakan program beasiswa dan pengembangan talenta dari ParagonCorp yang bertujuan mencetak generasi muda berkarakter, berprestasi, dan memiliki semangat kepemimpinan serta kontribusi sosial.',
                'syarat' => 'Mahasiswa aktif S1; Memiliki prestasi akademik yang baik; Aktif berorganisasi atau kegiatan sosial; Memiliki motivasi pengembangan diri; Memenuhi persyaratan administrasi program',
                'benefit' => 'Bantuan dana pendidikan; Mentoring bersama profesional ParagonCorp; Pelatihan kepemimpinan; Pengembangan karier; Serta akses komunitas penerima beasiswa',
                'tipe' => 'Partial',
                'deadline' => '2026-10-01',
                'status' => 'nonaktif'
            ],

            [
                'nama' => 'CIMB ASEAN Scholarship',
                'provider' => 'CIMB Niaga',
                'kategori' => 'Swasta',
                'deskripsi' => 'CIMB ASEAN Scholarship adalah program beasiswa regional yang mendukung mahasiswa berprestasi di kawasan ASEAN dengan fokus pada pengembangan akademik, kepemimpinan, dan kesiapan karier di industri keuangan dan bisnis.',
                'syarat' => 'Memiliki prestasi akademik yang sangat baik; Menunjukkan potensi kepemimpinan; Aktif dalam kegiatan organisasi atau sosial; Memenuhi persyaratan seleksi dan wawancara yang ditentukan oleh CIMB.',
                'benefit' => 'Pembiayaan pendidikan; Mentoring profesional; Program pengembangan kepemimpinan; Peluang magang; Networking regional ASEAN; Kesempatan pengembangan karier di lingkungan CIMB',
                'tipe' => 'Fully Funded',
                'deadline' => '2026-11-20',
                'status' => 'aktif'
            ],
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