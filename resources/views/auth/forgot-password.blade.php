<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - ScholarLink</title>

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
                    <i class="bi bi-key-fill"></i> Pemulihan Akun
                </div>
                <h2 class="text-5xl font-black leading-tight text-gray-900 mb-6">
                    Jangan khawatir, kami siap <span class="text-orange-600">membantu akses</span> akun Anda.
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed font-bold mb-10">
                    Masukkan email terdaftar Anda. Kami akan mengirimkan tautan pemulihan khusus untuk mengatur ulang password Anda dengan aman dan cepat.
                </p>

                <div class="grid grid-cols-2 gap-5">
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="bi bi-envelope-check-fill"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-base">Proses Instan</h3>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Tautan dikirim langsung ke email</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl flex-shrink-0">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-base">Aman & Terjaga</h3>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Metode enkripsi token terbaru</p>
                        </div>
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

                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-8 md:p-10">
                    <div class="mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg shadow-blue-500/20 mb-6">
                            <i class="bi bi-question-circle-fill"></i>
                        </div>
                        <h2 class="text-4xl font-black text-gray-900 mb-3">Lupa Password?</h2>
                        <p class="text-gray-500 font-bold leading-relaxed">
                            Beri tahu kami alamat email Anda, dan kami akan mengirimkan email berisi tautan untuk memilih password baru.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 bg-emerald-50 border border-emerald-200 rounded-2xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="text-emerald-500 text-xl">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-emerald-700 mb-1">Email Terkirim</h4>
                                    <p class="text-sm text-emerald-600 font-bold">
                                        {{ session('status') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="text-red-500 text-xl">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-red-700 mb-2">Terjadi Kesalahan</h4>
                                    <ul class="space-y-1 text-sm text-red-600 font-bold">
                                        @foreach ($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-black text-gray-700 mb-2">Email Terdaftar</label>
                            <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-2xl focus-within:border-cyan-500 focus-within:ring-4 focus-within:ring-cyan-100 transition duration-300">
                                <span class="pl-5 text-gray-400 flex items-center justify-center">
                                    <i class="bi bi-envelope-fill text-lg"></i>
                                </span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@email.com" class="w-full bg-transparent border-0 focus:ring-0 py-4 px-4 font-bold text-gray-900 placeholder:text-gray-400 text-base">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-4 rounded-2xl font-black text-lg transition shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.01]">
                            KIRIM TAUTAN PEMULIHAN
                        </button>
                    </form>

                    <div class="mt-8 text-center">
                        <p class="text-gray-500 font-bold">
                            Ingat password Anda? 
                            <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 font-black transition">
                                Masuk sekarang
                            </a>
                        </p>
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
