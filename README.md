# 🎓 ScholarLink

**ScholarLink** adalah aplikasi web berbasis **Laravel** untuk mengelola informasi beasiswa, pendaftaran beasiswa, dokumen pendaftar, daftar favorit, dashboard berbasis role, serta fitur chat room antara provider dan mahasiswa.

Aplikasi ini dirancang untuk membantu mahasiswa menemukan beasiswa yang sesuai, melakukan pendaftaran secara online, mengunggah dokumen pendukung, memantau status pendaftaran, dan berkomunikasi melalui ruang diskusi beasiswa.

---

## ✨ Preview Singkat

ScholarLink memiliki tiga jenis pengguna utama:

| Role | Fungsi Utama |
|---|---|
| **Admin** | Mengelola user, provider, dan data beasiswa |
| **Provider** | Mengelola beasiswa, melihat application, approve/reject pendaftar, dan membuat chat room |
| **Mahasiswa** | Melihat beasiswa, apply, upload dokumen, menyimpan favorit, dan mengikuti chat room |

---

## 🚀 Fitur Utama

### 🔐 Authentication

ScholarLink menggunakan **Laravel Breeze** sebagai sistem autentikasi.

Fitur autentikasi yang tersedia:

- Register
- Login
- Logout
- Forgot Password
- Reset Password
- Confirm Password
- Verify Email
- Redirect otomatis berdasarkan role

---

### 🧑‍💼 Admin Panel

Admin memiliki akses untuk mengelola data utama aplikasi.

Fitur admin:

- Mengelola data user
- Mengelola data provider
- Mengelola data beasiswa
- Melihat data aplikasi secara umum
- Mengakses dashboard admin

---

### 🏢 Provider Panel

Provider dapat mengelola program beasiswa dan pendaftar.

Fitur provider:

- Dashboard provider
- Tambah beasiswa
- Edit beasiswa
- Hapus beasiswa
- Melihat daftar application mahasiswa
- Approve application
- Reject application
- Membuat chat room beasiswa
- Melihat statistik beasiswa dan pendaftaran

---

### 🎓 Mahasiswa Area

Mahasiswa dapat mencari dan mendaftar beasiswa dengan mudah.

Fitur mahasiswa:

- Melihat daftar beasiswa
- Melihat detail beasiswa
- Mendaftar beasiswa
- Upload dokumen pendukung
- Menyimpan beasiswa ke favorites
- Melihat status application
- Mengakses chat rooms
- Mengirim pesan di chat room

---

### 💬 Chat Rooms

Fitur chat room digunakan sebagai ruang diskusi antara user yang berkaitan dengan program beasiswa.

Fitur chat room:

- Provider dapat membuat chat room
- User dapat membuka room
- User dapat mengirim pesan
- Pesan ditampilkan berdasarkan room
- Terhubung dengan data beasiswa

---

### ⭐ Favorites

Mahasiswa dapat menyimpan beasiswa yang diminati ke daftar favorit agar lebih mudah ditemukan kembali.

---

### 📁 Document Upload

Mahasiswa dapat mengunggah dokumen pendukung untuk application beasiswa.

Contoh dokumen:

- CV
- Sertifikat
- Transkrip nilai
- Dokumen pendukung lainnya

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| **Laravel 13** | Framework utama backend |
| **PHP 8.3** | Bahasa pemrograman backend |
| **MySQL** | Database utama |
| **Laravel Breeze** | Authentication scaffolding |
| **Blade Template** | View engine Laravel |
| **Tailwind CSS** | Styling frontend |
| **Vite** | Asset bundler |
| **Laragon** | Local development environment |

---

## 🗄️ Struktur Database Utama

Beberapa tabel utama yang digunakan dalam aplikasi:

| Tabel | Fungsi |
|---|---|
| `users` | Menyimpan akun pengguna |
| `providers` | Menyimpan data provider beasiswa |
| `categories` | Menyimpan kategori beasiswa |
| `scholarships` | Menyimpan data beasiswa |
| `applications` | Menyimpan data pendaftaran beasiswa |
| `documents` | Menyimpan dokumen application |
| `favorites` | Menyimpan beasiswa favorit mahasiswa |
| `chat_rooms` | Menyimpan ruang diskusi |
| `chat_participants` | Menyimpan peserta chat room |
| `messages` | Menyimpan pesan chat |
| `application_status_logs` | Menyimpan riwayat status application |
| `admin_logs` | Menyimpan aktivitas admin |

---

## 📌 Alur Sistem

### Alur Mahasiswa

```text
Register / Login
→ Lihat daftar beasiswa
→ Lihat detail beasiswa
→ Apply beasiswa
→ Upload dokumen
→ Pantau status application
→ Simpan favorites
→ Masuk chat room
→ Kirim pesan
```

### Alur Provider

```text
Login provider
→ Masuk provider dashboard
→ Tambah beasiswa
→ Kelola beasiswa
→ Lihat application mahasiswa
→ Approve / reject application
→ Buat chat room
→ Berkomunikasi dengan user
```

### Alur Admin

```text
Login admin
→ Masuk admin dashboard
→ Kelola user
→ Kelola provider
→ Kelola beasiswa
→ Monitoring data aplikasi
```
---

## ERD (Entity Relationship Diagram)

<img width="1703" height="1264" alt="ERD ScholarLink Final1" src="https://github.com/user-attachments/assets/d17ec4ed-0d8d-4941-8f4e-710fda5464ef" />

---

## ⚙️ Instalasi Project

### 1. Clone Repository

```bash
git clone https://github.com/acumalaka-tzy/scholarlink.git
cd scholarlink
```

### 2. Install Dependency Laravel

```bash
composer install
```

### 3. Install Dependency Frontend

```bash
npm install
```

### 4. Copy File Environment

```bash
cp .env.example .env
```

Untuk Windows, jika command di atas tidak bisa, gunakan:

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Atur Database di `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=scholarlink
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Jalankan Migration dan Seeder

```bash
php artisan migrate --seed
```

### 8. Jalankan Storage Link

```bash
php artisan storage:link
```

### 9. Jalankan Vite

```bash
npm run dev
```

### 10. Jalankan Server Laravel

```bash
php artisan serve
```

Akses aplikasi melalui:

```text
http://127.0.0.1:8000
```

---

## 👤 Akun Demo

Gunakan akun berikut untuk testing aplikasi.

### Admin

```text
Email    : admin@gmail.com
Password : password
```

### Provider

```text
Email    : provider@gmail.com
Password : password
```

### Mahasiswa

```text
Email    : mahasiswa@gmail.com
Password : password
```

> Catatan: Sesuaikan akun demo dengan data yang ada di seeder project.

---

## 🧭 Route Utama

| Halaman | URL |
|---|---|
| Home | `/` |
| Login | `/login` |
| Register | `/register` |
| Admin Dashboard | `/admin` |
| Provider Dashboard | `/provider` |
| Mahasiswa Dashboard | `/dashboard` |
| Scholarships | `/scholarships` |
| Applications | `/applications` |
| Documents | `/documents` |
| Favorites | `/favorites` |
| Chat Rooms | `/chat-rooms` |

---

## 📂 Struktur Folder Penting

```text
app/
├── Http/
│   ├── Controllers/
│   ├── Controllers/Admin/
│   └── Controllers/Provider/
├── Models/

database/
├── migrations/
├── seeders/
└── factories/

resources/
├── views/
│   ├── auth/
│   ├── admin/
│   ├── provider/
│   ├── scholarships/
│   ├── applications/
│   ├── documents/
│   ├── favorites/
│   └── chat_rooms/

routes/
└── web.php
```

---

## ✅ Status Project

Project ini sudah memiliki fitur utama untuk sistem pengelolaan beasiswa berbasis web.

Progress fitur saat ini:

| Fitur | Status |
|---|---|
| Authentication | ✅ Selesai |
| Role-based redirect | ✅ Selesai |
| Home page | ✅ Selesai |
| Admin panel | ✅ Tersedia |
| Provider dashboard | ✅ Tersedia |
| Scholarship management | ✅ Tersedia |
| Application management | ✅ Tersedia |
| Document upload | ✅ Tersedia |
| Favorites | ✅ Tersedia |
| Chat rooms | ✅ Tersedia |
| Realtime chat | ⏳ Pengembangan selanjutnya |
| Notification system | ⏳ Pengembangan selanjutnya |

---

## 🔮 Rencana Pengembangan

Beberapa fitur yang dapat dikembangkan selanjutnya:

- Realtime chat menggunakan Laravel Reverb / Pusher
- Notifikasi application
- Filter beasiswa berdasarkan kategori
- Search beasiswa
- Export data application
- Dashboard statistik yang lebih detail
- Pengamanan file upload
- Validasi role dan authorization yang lebih ketat
- Tampilan mobile yang lebih optimal
- Email notification untuk status application

---

## 🔒 Catatan Keamanan

Sebelum project di-upload ke GitHub, pastikan:

- File `.env` tidak ikut ter-upload
- `APP_DEBUG=false` untuk production
- Password akun demo tidak digunakan di production
- Validasi form sudah diterapkan
- Role access sudah dibatasi dengan middleware
- Upload dokumen dibatasi tipe dan ukuran file

---

## 👥 Kontributor

Project **ScholarLink** dikembangkan oleh tim berikut:

| No | Nama | NIM | Status | Peran / Tugas |
|---|---|---|---|---|
| 1 | Gabriel Saurman Parhusip | 251402043 | Aktif | Backend Developer |
| 2 | Rodotua Naomi Mutiara Simamora | 251402030 | Aktif | Database & Backend Core Lead |
| 3 | Charles | 251402081 | Aktif | Backend Developer |
| 4 | Aldiva Roelya Padang | 251402007 | Aktif | Frontend Developer |
| 5 | Patricia Putri Josephine Situmeang | 251402119 | Aktif | Frontend Developer |

### Pembagian Tugas

#### 🗄️ Database & Backend Core Lead
**Rodotua Naomi Mutiara Simamora**
- Merancang struktur database utama.
- Mengelola relasi antar tabel.
- Menyusun migration dan struktur tabel.
- Mengatur alur backend utama.
- Memastikan integrasi database dengan fitur aplikasi.
- Mengelola logic inti pada fitur application, document, favorite, dan chat room.

#### ⚙️ Backend Developer
**Gabriel Saurman Parhusip** dan **Charles**
- Membantu pengembangan controller dan route.
- Mengelola logic backend sesuai kebutuhan fitur.
- Membantu integrasi fitur admin, provider, dan mahasiswa.
- Membantu proses debugging backend.
- Membantu pengujian fitur berbasis role.

#### 🎨 Frontend Developer
**Aldiva Roelya Padang** dan **Patricia Putri Josephine Situmeang**
- Mendesain tampilan halaman aplikasi.
- Membuat tampilan responsive.
- Mengatur layout halaman home, dashboard, auth, dan fitur utama.
- Menyesuaikan tampilan UI agar lebih menarik dan mudah digunakan.
- Membantu integrasi tampilan dengan data dari backend.

---

## 📄 Lisensi

Project ini dibuat untuk kebutuhan pembelajaran, pengembangan aplikasi web, dan demonstrasi sistem pengelolaan beasiswa.

---

## 💡 Deskripsi Singkat Repository

```text
ScholarLink adalah aplikasi web Laravel untuk mengelola beasiswa, application mahasiswa, dokumen, favorites, dashboard admin/provider/mahasiswa, dan chat rooms.
```
