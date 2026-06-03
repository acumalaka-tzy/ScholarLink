<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ScholarLink</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
        
        /* Responsive Mobile Fix */
        @media (max-width: 768px) {
            input, select {
                font-size: 16px !important;
            }
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased overflow-x-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="min-h-screen grid lg:grid-cols-2">
        <div class="hidden lg:flex flex-col justify-between p-8 sm:p-12 relative overflow-hidden">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3">
                    <div class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-lg sm:rounded-2xl flex items-center justify-center text-white font-black text-xl sm:text-2xl shadow-lg">
                        S
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-3xl font-black tracking-tight text-gray-900">ScholarLink</h1>
                        <p class="text-gray-500 font-bold text-xs sm:text-sm">Platform Beasiswa Terpercaya</p>
                    </div>
                </a>
            </div>

            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-xs sm:text-sm mb-4 sm:mb-6 border border-orange-200">
                    <i class="bi bi-mortarboard-fill"></i> Welcome Back
                </div>
                <h2 class="text-3xl sm:text-5xl font-black leading-tight text-gray-900 mb-4 sm:mb-6">
                    Lanjutkan perjalanan <span class="text-orange-600">beasiswa impian</span> Anda.
                </h2>
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed font-bold mb-6 sm:mb-10">
                    Masuk untuk mengelola aplikasi beasiswa, upload dokumen, menyimpan favorit, dan memantau perkembangan pendidikan Anda.
                </p>

                <div class="grid grid-cols-3 gap-3 sm:gap-5">
                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-6 shadow-sm border border-gray-100">
                        <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg sm:text-2xl mb-2 sm:mb-4">
                            <i class="bi bi-journals"></i>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-black text-gray-900">1K+</h3>
                        <p class="text-xs sm:text-sm text-gray-500 font-bold mt-1">Beasiswa</p>
                    </div>

                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-6 shadow-sm border border-gray-100">
                        <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-lg sm:text-2xl mb-2 sm:mb-4">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-black text-gray-900">500+</h3>
                        <p class="text-xs sm:text-sm text-gray-500 font-bold mt-1">Awardee</p>
                    </div>

                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-6 shadow-sm border border-gray-100">
                        <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-lg sm:text-2xl mb-2 sm:mb-4">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-black text-gray-900">24/7</h3>
                        <p class="text-xs sm:text-sm text-gray-500 font-bold mt-1">Akses</p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-gray-400 text-xs sm:text-sm font-bold">© 2026 ScholarLink. Semua hak dilindungi.</p>
            </div>
        </div>

        <div class="flex items-center justify-center px-4 sm:px-6 py-8 sm:py-12">
            <div class="w-full max-w-md">
                <div class="lg:hidden text-center mb-6 sm:mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 sm:gap-3">
                        <div class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-lg sm:rounded-2xl flex items-center justify-center text-white font-black text-lg sm:text-2xl shadow-lg">
                            S
                        </div>
                        <span class="text-2xl sm:text-3xl font-black tracking-tight text-gray-900">ScholarLink</span>
                    </a>
                </div>

                <div class="bg-white rounded-2xl sm:rounded-[2rem] shadow-xl border border-gray-100 p-6 sm:p-8 md:p-10">
                    <div class="mb-6 sm:mb-8">
                        <div class="w-14 sm:w-16 h-14 sm:h-16 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-2xl sm:rounded-3xl flex items-center justify-center text-white text-2xl sm:text-3xl shadow-lg shadow-blue-500/20 mb-4 sm:mb-6">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-black text-gray-900 mb-2 sm:mb-3">Masuk Akun</h2>
                        <p class="text-gray-500 font-bold leading-relaxed text-sm sm:text-base">
                            Gunakan email dan password yang sudah terdaftar untuk melanjutkan perjalanan beasiswa Anda.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg sm:rounded-2xl p-4 sm:p-5">
                            <div class="flex items-center gap-3">
                                <div class="text-green-500 text-lg sm:text-xl flex-shrink-0">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="text-xs sm:text-sm text-green-700 font-bold">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg sm:rounded-2xl p-4 sm:p-5">
                            <div class="flex items-start gap-3">
                                <div class="text-red-500 text-lg sm:text-xl flex-shrink-0">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-red-700 mb-2 text-sm sm:text-base">Terjadi Kesalahan</h4>
                                    <ul class="space-y-1 text-xs sm:text-sm text-red-600 font-bold">
                                        @foreach ($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="bi bi-envelope-fill text-sm sm:text-base"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@email.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-sm sm:text-base">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="bi bi-lock-fill text-sm sm:text-base"></i>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 sm:pr-5 py-2.5 sm:py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-sm sm:text-base">
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-1">
                            <label class="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm text-gray-600 font-bold cursor-pointer">
                                <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                                <span>Ingat Saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-cyan-600 hover:text-cyan-700 font-black transition">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-2.5 sm:py-4 rounded-lg sm:rounded-2xl font-black text-sm sm:text-lg transition shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.01]">
                            LOG IN
                        </button>
                    </form>

                    <div class="mt-6 sm:mt-8 text-center">
                        <p class="text-gray-500 font-bold text-xs sm:text-base">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-black transition">
                                Daftar sekarang
                            </a>
                        </p>
                    </div>
                </div>

                <div class="mt-4 sm:mt-6 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-xs sm:text-sm font-black transition">
                        <i class="bi bi-arrow-left"></i> Kembali ke halaman utama
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
                            Gunakan email dan password yang sudah terdaftar untuk melanjutkan perjalanan beasiswa Anda.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-2xl p-5">
                            <div class="flex items-center gap-3">
                                <div class="text-green-500 text-xl">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="text-sm text-green-700 font-bold">
                                    {{ session('status') }}
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

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-black text-gray-700 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@email.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-black text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-1">
                            <label class="flex items-center gap-3 text-sm text-gray-600 font-bold cursor-pointer">
                                <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                                Ingat Saya
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-cyan-600 hover:text-cyan-700 font-black transition">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-4 rounded-2xl font-black text-lg transition shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.01]">
                            LOG IN
                        </button>
                    </form>

                    <div class="mt-8 text-center">
                        <p class="text-gray-500 font-bold">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-black transition">
                                Daftar sekarang
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
