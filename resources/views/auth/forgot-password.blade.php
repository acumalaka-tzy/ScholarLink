<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - ScholarLink</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-scholarlink.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
        
        @media (max-width: 768px) {
            .forgot-form input {
                font-size: 16px !important;
            }
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased selection:bg-blue-600 selection:text-white overflow-x-hidden">

    <div class="min-h-screen grid lg:grid-cols-2">
        
        <div class="hidden lg:flex flex-col justify-between p-6 lg:p-8 xl:p-12 relative overflow-hidden bg-gradient-to-br from-cyan-50 via-[#d1e9f6] to-cyan-50">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-60"></div>
            <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-orange-100 rounded-full blur-3xl opacity-60"></div>

            <div class="relative z-10">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-scholarlink.png') }}" class="w-8 lg:w-10 h-8 lg:h-10 rounded-full shadow-md object-cover" alt="ScholarLink Logo">
                    <span class="text-lg lg:text-2xl font-black tracking-tight text-gray-900">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="max-w-2xl mx-auto relative z-10">
                <div class="inline-flex items-center gap-2 px-3 lg:px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-xs lg:text-sm mb-4 lg:mb-6 border border-orange-200">
                    <i class="bi bi-key-fill"></i> Pemulihan Akun
                </div>

                <h2 class="text-3xl lg:text-5xl font-black leading-tight mb-4 lg:mb-6 text-gray-900">
                    Jangan khawatir, kami siap <br>
                    <span class="text-orange-600">membantu akses</span> akun Anda.
                </h2>

                <p class="text-gray-600 text-base lg:text-lg leading-relaxed font-bold mb-6 lg:mb-10">
                    Masukkan email terdaftar Anda. Kami akan mengirimkan tautan pemulihan khusus untuk mengatur ulang password Anda dengan aman dan cepat.
                </p>

                <div class="grid grid-cols-2 gap-3 lg:gap-4 max-w-md">
                    <div class="bg-white rounded-2xl lg:rounded-3xl p-3 lg:p-5 border border-gray-100 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg flex-shrink-0">
                            <i class="bi bi-envelope-check-fill"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-sm">Proses Instan</h3>
                            <p class="text-[10px] text-gray-500 font-bold mt-0.5">Tautan ke email</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl lg:rounded-3xl p-3 lg:p-5 border border-gray-100 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-lg flex-shrink-0">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-sm">Aman & Terjaga</h3>
                            <p class="text-[10px] text-gray-500 font-bold mt-0.5">Enkripsi terbaru</p>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-gray-400 text-xs lg:text-sm relative z-10 font-bold">
                &copy; 2026 ScholarLink. Semua hak dilindungi.
            </p>
        </div>

        <div class="flex items-center justify-center p-4 md:p-6 lg:p-8 lg:p-12 bg-[#f4f7f9] min-h-screen lg:min-h-auto">
            <div class="w-full flex flex-col items-center">

                <div class="w-full max-w-md bg-white p-5 md:p-8 lg:p-10 rounded-2xl md:rounded-[2.5rem] shadow-sm border border-gray-100">
                    
                    <div class="mb-6 md:mb-8">
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-2">Lupa Password?</h3>
                        <p class="text-gray-500 font-bold text-xs md:text-sm">
                            Beri tahu kami alamat email Anda, dan kami akan mengirimkan email berisi tautan pemulihan.
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

                    <form method="POST" action="{{ route('password.email') }}" class="forgot-form space-y-4 md:space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-xs md:text-sm font-black text-gray-700 mb-2">Email Terdaftar</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                    <i class="bi bi-envelope-fill text-sm md:text-base"></i>
                                </span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full pl-10 md:pl-11 pr-3 md:pr-4 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white transition text-sm md:text-base">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-3 md:py-4 rounded-xl md:rounded-2xl font-black text-sm md:text-base tracking-wide transition shadow-lg shadow-blue-500/20 hover:shadow-xl hover:scale-[1.01] active:scale-[0.99] block mt-6 md:mt-8">
                            Kirim Tautan Pemulihan
                        </button>
                    </form>

                    <div class="mt-6 md:mt-8 text-center">
                        <p class="text-gray-500 font-bold text-xs md:text-sm">
                            Ingat password Anda?
                            <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 font-black transition">
                                Masuk sekarang
                            </a>
                        </p>
                    </div>
                </div>

                <div class="w-full max-w-md mt-4 md:mt-6 flex justify-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-xs md:text-sm font-black transition">
                        <i class="bi bi-arrow-left"></i> Kembali ke halaman utama
                    </a>
                </div>

            </div>
        </div>
    
    </div>

</body>
</html>
