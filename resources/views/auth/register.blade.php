<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - ScholarLink</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
        
        /* Responsive Improvements */
        @media (max-width: 768px) {
            .register-form input,
            .register-form select {
                font-size: 16px !important;
            }
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased selection:bg-blue-600 selection:text-white">

    <div class="min-h-screen grid lg:grid-cols-2">
        
        <div class="hidden lg:flex flex-col justify-between p-12 relative overflow-hidden bg-gradient-to-br from-cyan-50 via-[#d1e9f6] to-cyan-50">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-60"></div>
            <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-orange-100 rounded-full blur-3xl opacity-60"></div>

            <div class="relative z-10">
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3">
                    <div class="w-8 sm:w-10 h-8 sm:h-10 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-lg flex items-center justify-center text-white font-black text-lg sm:text-xl shadow-md">
                        S
                    </div>
                    <span class="text-lg sm:text-2xl font-black tracking-tight text-gray-900">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="max-w-xl relative z-10">
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-xs sm:text-sm mb-4 sm:mb-6 border border-orange-200">
                    <i class="bi bi-mortarboard-fill"></i> Join ScholarLink
                </div>

                <h2 class="text-3xl sm:text-5xl font-black leading-tight mb-4 sm:mb-6 text-gray-900">
                    Daftar dan mulai <br>
                    <span class="text-orange-600">perjalanan beasiswa</span> <br>
                    kamu.
                </h2>

                <p class="text-gray-600 text-base sm:text-lg leading-relaxed font-bold mb-6 sm:mb-10">
                    Buat akun untuk mengakses beasiswa, mengirim application, upload dokumen, menyimpan favorit, dan mengikuti diskusi melalui chat room.
                </p>

                <div class="grid grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl sm:text-3xl font-black text-blue-600">1K+</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Beasiswa</p>
                    </div>

                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl sm:text-3xl font-black text-orange-500">500+</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Penerima</p>
                    </div>

                    <div class="bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl sm:text-3xl font-black text-green-600">Gratis</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Daftar</p>
                    </div>
                </div>
            </div>

            <p class="text-gray-400 text-xs sm:text-sm relative z-10 font-bold">
                &copy; 2026 ScholarLink. Semua hak dilindungi secara berwarna.
            </p>
        </div>

        <div class="flex items-center justify-center p-4 sm:p-6 md:p-12 bg-[#f4f7f9]">
            <div class="w-full max-w-md bg-white p-6 sm:p-8 md:p-10 rounded-2xl sm:rounded-[2.5rem] shadow-sm border border-gray-100">
                <div class="mb-6 sm:mb-8">
                    <h3 class="text-2xl sm:text-3xl font-black text-gray-900 mb-2">Buat Akun</h3>
                    <p class="text-gray-500 font-bold text-xs sm:text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a></p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="register-form space-y-4 sm:space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-xl focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition duration-300">
                            <span class="pl-4 sm:pl-5 text-gray-400 flex items-center justify-center">
                                <i class="bi bi-person-fill text-base sm:text-lg"></i>
                            </span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-transparent border-0 focus:ring-0 py-2.5 sm:py-3 px-3 sm:px-4 font-bold text-gray-900 placeholder:text-gray-400 text-sm sm:text-base" placeholder="Nama lengkap Anda">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Alamat Email</label>
                        <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-xl focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition duration-300">
                            <span class="pl-4 sm:pl-5 text-gray-400 flex items-center justify-center">
                                <i class="bi bi-envelope-fill text-base sm:text-lg"></i>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full bg-transparent border-0 focus:ring-0 py-2.5 sm:py-3 px-3 sm:px-4 font-bold text-gray-900 placeholder:text-gray-400 text-sm sm:text-base" placeholder="contoh@email.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Daftar Sebagai</label>
                        <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-xl focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition duration-300 relative">
                            <span class="pl-4 sm:pl-5 text-gray-400 flex items-center justify-center pointer-events-none">
                                <i class="bi bi-people-fill text-base sm:text-lg"></i>
                            </span>
                            <select id="role" name="role" required class="w-full bg-transparent border-0 focus:ring-0 py-2.5 sm:py-3 pl-3 sm:pl-4 pr-10 font-bold text-gray-900 text-sm sm:text-base appearance-none cursor-pointer">
                                <option value="" class="bg-white">Pilih Role...</option>
                                <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }} class="bg-white">Mahasiswa (Pencari Beasiswa)</option>
                                <option value="provider" {{ old('role') == 'provider' ? 'selected' : '' }} class="bg-white">Provider (Penyedia Beasiswa)</option>
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none text-gray-400">
                                <i class="bi bi-chevron-down text-sm sm:text-base"></i>
                            </span>
                        </div>
                        @error('role')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Password</label>
                        <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-xl focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition duration-300">
                            <span class="pl-4 sm:pl-5 text-gray-400 flex items-center justify-center">
                                <i class="bi bi-lock-fill text-base sm:text-lg"></i>
                            </span>
                            <input type="password" id="password" name="password" required class="w-full bg-transparent border-0 focus:ring-0 py-2.5 sm:py-3 px-3 sm:px-4 font-bold text-gray-900 placeholder:text-gray-400 text-sm sm:text-base" placeholder="Masukkan password">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs sm:text-sm font-black text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="flex items-center bg-gray-50 border-2 border-gray-200 rounded-xl focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition duration-300">
                            <span class="pl-4 sm:pl-5 text-gray-400 flex items-center justify-center">
                                <i class="bi bi-shield-lock-fill text-base sm:text-lg"></i>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full bg-transparent border-0 focus:ring-0 py-2.5 sm:py-3 px-3 sm:px-4 font-bold text-gray-900 placeholder:text-gray-400 text-sm sm:text-base" placeholder="Ulangi password">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-2.5 sm:py-4 rounded-xl font-black hover:from-blue-700 hover:to-cyan-700 transition shadow-lg shadow-blue-600/20 text-center block mt-6 sm:mt-8 text-sm sm:text-base">
                        Daftar Akun Gratis
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
