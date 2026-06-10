<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - ScholarLink</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased overflow-x-hidden">

    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="min-h-screen grid lg:grid-cols-2">

        <div class="hidden lg:flex flex-col justify-between p-12 relative overflow-hidden">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-2xl flex items-center justify-center text-white font-black text-2xl shadow-lg">
                        S
                    </div>
                    <div>
                        <h1 class="text-3xl font-black tracking-tight text-gray-900">ScholarLink</h1>
                        <p class="text-gray-500 font-bold text-sm">Platform Beasiswa Terpercaya</p>
                    </div>
                </a>
            </div>

            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-6 border border-orange-200">
                    <i class="bi bi-patch-check-fill"></i> Konfirmasi Identitas
                </div>
                <h2 class="text-5xl font-black leading-tight text-gray-900 mb-6">
                    Satu langkah lagi untuk <span class="text-orange-600">aktifkan akun</span> Anda.
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed font-bold mb-10">
                    Silakan lakukan verifikasi email terlebih dahulu agar dapat menikmati akses penuh fitur simpan beasiswa favorit, unggah dokumen pendaftaran, hingga fitur diskusi kelompok.
                </p>

                <div class="grid grid-cols-3 gap-5">
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl mb-4">
                            <i class="bi bi-journals"></i>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900">1K+</h3>
                        <p class="text-sm text-gray-500 font-bold mt-1">Beasiswa</p>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-2xl mb-4">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900">500+</h3>
                        <p class="text-sm text-gray-500 font-bold mt-1">Awardee</p>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl mb-4">
                            <i class="bi bi-shield-check-fill"></i>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900">Aman</h3>
                        <p class="text-sm text-gray-500 font-bold mt-1">Terproteksi</p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-gray-400 text-sm font-bold">© 2026 ScholarLink. Semua hak dilindungi.</p>
            </div>
        </div>

        <div class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                
                <div class="lg:hidden text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-2xl flex items-center justify-center text-white font-black text-2xl shadow-lg">
                            S
                        </div>
                        <span class="text-3xl font-black tracking-tight text-gray-900">ScholarLink</span>
                    </a>
                </div>

                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 md:p-10 text-center">
                    
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-[2rem] flex items-center justify-center text-white text-4xl shadow-lg shadow-blue-500/20 mx-auto mb-6">
                        <i class="bi bi-envelope-check-fill"></i>
                    </div>

                    <h2 class="text-4xl font-black text-gray-900 mb-4">Verifikasi Email</h2>
                    
                    <p class="text-gray-500 font-bold leading-relaxed mb-2">
                        Terima kasih telah bergabung bersama kami!
                    </p>
                    <p class="text-gray-500 font-medium leading-relaxed">
                        Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan ke kotak masuk Anda.
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mt-6 bg-green-50 border border-green-200 rounded-2xl p-5 text-left">
                            <div class="flex items-start gap-3">
                                <div class="text-green-500 text-xl mt-0.5">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-green-700 mb-1">Email Terkirim</h4>
                                    <p class="text-sm text-green-600 font-bold">
                                        Tautan verifikasi baru telah berhasil dikirimkan ke alamat email yang Anda daftarkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-8 space-y-4">
                        <form method="POST" action="{{ route('verification.send') }}" onsubmit="document.getElementById('resend-btn').disabled = true; document.getElementById('resend-btn').innerText = 'MENGIRIM...';">
                            @csrf
                            <button id="resend-btn" type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-4 rounded-2xl font-black text-lg transition shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.01] disabled:opacity-70 disabled:cursor-not-allowed">
                                KIRIM ULANG EMAIL VERIFIKASI
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full bg-gray-50 hover:bg-gray-100 border-2 border-gray-200 text-gray-700 py-4 rounded-2xl font-black transition tracking-wide text-sm">
                                <i class="bi bi-box-arrow-right mr-2"></i> KELUAR / LOGOUT
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-sm font-black transition">
                        <i class="bi bi-arrow-left"></i> Kembali ke halaman utama
                    </a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
