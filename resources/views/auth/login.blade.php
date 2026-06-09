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
        
        @media (max-width: 768px) {
            input, select {
                font-size: 16px !important;
            }
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased overflow-x-hidden min-h-screen flex items-center justify-center">
    
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="w-full max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-16 items-center">
            <div class="hidden lg:flex lg:col-span-7 flex-col justify-center pl-32 xl:pl-40">
            
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-11 h-11 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg">
                            S
                        </div>
                        <div>
                            <h1 class="text-2xl font-black tracking-tight text-gray-900 leading-none">ScholarLink</h1>
                            <p class="text-gray-500 font-bold text-xs mt-0.5">Platform Beasiswa Terpercaya</p>
                        </div>
                    </a>
                </div>

                <div class="max-w-2xl mt-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-orange-100 text-orange-700 font-bold text-xs mb-4 border border-orange-200">
                        <i class="bi bi-mortarboard-fill"></i> Welcome Back
                    </div>
                    <h2 class="text-3xl xl:text-4xl font-black leading-tight text-gray-900 mb-4">
                        Lanjutkan perjalanan <span class="text-orange-600">beasiswa impian</span> Anda.
                    </h2>
                    <p class="text-gray-600 text-sm xl:text-base leading-relaxed font-bold mb-6">
                        Masuk untuk mengelola aplikasi beasiswa, upload dokumen, menyimpan favorit, dan memantau perkembangan pendidikan Anda.
                    </p>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg mb-2">
                                <i class="bi bi-journals"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900">1K+</h3>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Beasiswa</p>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                            <div class="w-9 h-9 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center text-lg mb-2">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900">500+</h3>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Awardee</p>
                        </div>

                        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                            <div class="w-9 h-9 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-lg mb-2">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900">24/7</h3>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Akses</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-gray-400 text-xs font-bold">© 2026 ScholarLink. Semua hak dilindungi.</p>
                </div>
            </div>

            <div class="lg:col-span-5 flex items-center justify-center">
                <div class="w-full max-w-md">
                    
                    <div class="lg:hidden text-center mb-6">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-white-600 to-white-500 flex items-center justify-center overflow-hidden shadow-md">
                                <img src="{{ asset('images/logo-scholarlink.png') }}" alt="ScholarLink" class="w-8 h-8 object-contain rounded-full">
                            </div>
                            <span class="text-2xl font-black tracking-tight text-gray-900">ScholarLink</span>
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl lg:rounded-[1.5rem] shadow-xl border border-gray-100 p-6 md:p-8">
                        <div class="mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-xl flex items-center justify-center text-white text-xl shadow-lg shadow-blue-500/20 mb-4">
                                <i class="bi bi-box-arrow-in-right"></i>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-black text-gray-900 mb-1.5">Masuk Akun</h2>
                            <p class="text-gray-500 font-bold leading-relaxed text-xs md:text-sm">
                                Gunakan email dan password yang sudah terdaftar untuk melanjutkan perjalanan beasiswa Anda.
                            </p>
                        </div>

                        @if (session('status'))
                            <div class="mb-5 bg-green-50 border border-green-200 rounded-xl p-4">
                                <div class="flex items-center gap-3">
                                    <div class="text-green-500 text-lg flex-shrink-0">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </div>
                                    <div class="text-xs text-green-700 font-bold">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-5 bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex items-start gap-3">
                                    <div class="text-red-500 text-lg flex-shrink-0">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-black text-red-700 mb-1 text-xs md:text-sm">Terjadi Kesalahan</h4>
                                        <ul class="space-y-0.5 text-xs text-red-600 font-bold">
                                            @foreach ($errors->all() as $error)
                                                <li>• {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label for="email" class="block text-xs font-black text-gray-700 mb-1.5">Email Address</label>
                                <div class="relative">
                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="bi bi-envelope-fill text-sm"></i>
                                    </div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@email.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl pl-11 pr-4 py-2.5 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-xs font-black text-gray-700 mb-1.5">Password</label>
                                <div class="relative">
                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="bi bi-lock-fill text-sm"></i>
                                    </div>
                                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl pl-11 pr-11 py-2.5 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-sm">
                                    <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-cyan-500">
                                        <i id="eyeIcon" class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between gap-4 pt-0.5">
                                <label class="flex items-center gap-2 text-xs text-gray-600 font-bold cursor-pointer">
                                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4">
                                    <span>Ingat Saya</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs text-cyan-600 hover:text-cyan-700 font-black transition">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-3 rounded-xl font-black text-sm tracking-wide transition shadow-lg shadow-blue-500/10 hover:shadow-xl hover:scale-[1.01] active:scale-[0.99]">
                                LOG IN
                            </button>
                        </form>

                        <div class="mt-6 text-center">
                            <p class="text-gray-500 font-bold text-xs">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-black transition">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-xs font-black transition">
                            <i class="bi bi-arrow-left"></i> Kembali ke halaman utama
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('bi-eye-fill');
            eyeIcon.classList.add('bi-eye-slash-fill');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash-fill');
            eyeIcon.classList.add('bi-eye-fill');
        }
    }
</script>

</body>
</html>
