<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - ScholarLink</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobaru.png') }}">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Nunito', sans-serif !important;
        }
        
        @media (max-width: 768px) {
            .register-form input,
            .register-form select {
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
                    <img src="{{ asset('images/logobaru.png') }}" class="w-8 lg:w-10 h-8 lg:h-10 rounded-full shadow-md object-cover" alt="ScholarLink Logo">
                    <span class="text-lg lg:text-2xl font-black tracking-tight text-gray-900">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="max-w-xl relative z-10">
                <div class="inline-flex items-center gap-2 px-3 lg:px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-xs lg:text-sm mb-4 lg:mb-6 border border-orange-200">
                    <i class="bi bi-mortarboard-fill"></i> Join ScholarLink
                </div>

                <h2 class="text-3xl lg:text-5xl font-black leading-tight mb-4 lg:mb-6 text-gray-900">
                    Daftar dan mulai <br>
                    <span class="text-orange-600">perjalanan beasiswa</span> <br>
                    kamu.
                </h2>

                <p class="text-gray-600 text-base lg:text-lg leading-relaxed font-bold mb-6 lg:mb-10">
                    Buat akun untuk mengakses beasiswa, mengirim application, upload dokumen, menyimpan favorit, dan mengikuti diskusi melalui chat room.
                </p>

                <div class="grid grid-cols-3 gap-3 lg:gap-4">
                    <div class="bg-white rounded-2xl lg:rounded-3xl p-3 lg:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl lg:text-3xl font-black text-blue-600">1K+</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Beasiswa</p>
                    </div>

                    <div class="bg-white rounded-2xl lg:rounded-3xl p-3 lg:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl lg:text-3xl font-black text-orange-500">500+</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Penerima</p>
                    </div>

                    <div class="bg-white rounded-2xl lg:rounded-3xl p-3 lg:p-5 border border-gray-100 shadow-sm text-center">
                        <p class="text-2xl lg:text-3xl font-black text-green-600">Gratis</p>
                        <p class="text-gray-500 text-xs mt-1 font-bold">Daftar</p>
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
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-2">Buat Akun</h3>
                        <p class="text-gray-500 font-bold text-xs md:text-sm">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="register-form space-y-4 md:space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs md:text-sm font-black text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                <i class="bi bi-person-fill text-sm md:text-base"></i>
                            </span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="w-full pl-10 md:pl-11 pr-3 md:pr-4 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white transition text-sm md:text-base">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs md:text-sm font-black text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                <i class="bi bi-envelope-fill text-sm md:text-base"></i>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full pl-10 md:pl-11 pr-3 md:pr-4 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:bg-white transition text-sm md:text-base">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-xs md:text-sm font-black text-gray-700 mb-2">Daftar Sebagai</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                <i class="bi bi-people-fill text-sm md:text-base"></i>
                            </span>
                            <select id="role" name="role" required class="w-full pl-10 md:pl-11 pr-10 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 focus:outline-none focus:border-blue-500 focus:bg-white transition appearance-none text-sm md:text-base">
                                <option value="">Pilih Role...</option>
                                <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa (Pencari Beasiswa)</option>
                                <option value="provider" {{ old('role') == 'provider' ? 'selected' : '' }}>Provider (Penyedia Beasiswa)</option>
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 md:pr-4 pointer-events-none text-gray-400">
                                <i class="bi bi-chevron-down text-sm md:text-base"></i>
                            </span>
                        </div>
                        @error('role')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <label for="password" class="block text-xs md:text-sm font-black text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                    <i class="bi bi-lock-fill text-sm md:text-base"></i>
                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    class="w-full pl-10 md:pl-11 pr-12 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 focus:outline-none focus:border-blue-500 focus:bg-white transition text-sm md:text-base">

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-blue-600">

                                    <i id="eyeIcon" class="bi bi-eye-fill"></i>

                                </button>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs md:text-sm font-black text-gray-700 mb-2">
                            Konfirmasi Password
                        </label>

                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 md:pl-4 text-gray-400 pointer-events-none">
                                <i class="bi bi-shield-lock-fill text-sm md:text-base"></i>
                            </span>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                class="w-full pl-10 md:pl-11 pr-12 py-2.5 md:py-3 bg-gray-50 border-2 border-gray-100 rounded-lg md:rounded-xl font-semibold text-gray-900 focus:outline-none focus:border-blue-500 focus:bg-white transition text-sm md:text-base">

                            <button
                                type="button"
                                onclick="toggleConfirmPassword()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-blue-600">

                                <i id="eyeConfirmIcon" class="bi bi-eye-fill"></i>

                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-3 md:py-4 rounded-lg md:rounded-xl font-black hover:from-blue-700 hover:to-cyan-700 transition shadow-lg shadow-blue-600/20 text-center block mt-6 md:mt-8 text-sm md:text-base active:scale-[0.99]">
                        Daftar Akun Gratis
                    </button>
                </form>
                </div>

                <div class="w-full max-w-md mt-4 md:mt-6 flex justify-center">
                    <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-xs md:text-sm font-black transition">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke halaman utama
                    </a>
                </div>

            </div>
        </div>
    
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
            } else {
                password.type = 'password';
                icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
            }
        }

        function toggleConfirmPassword() {
            const password = document.getElementById('password_confirmation');
            const icon = document.getElementById('eyeConfirmIcon');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
            } else {
                password.type = 'password';
                icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
            }
        }
        </script>

</body>
</html>
