<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - ScholarLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
        }
        
        .gradient-bg::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            border-radius: 50%;
        }
        
        .gradient-bg::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.15) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            border-radius: 50%;
        }
        
        .form-input {
            transition: all 0.3s ease;
            background: white;
            border: 2px solid #e5e7eb;
        }
        
        .form-input:focus {
            background: white;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            transform: translateY(-2px);
        }
        
        .animate-fade {
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(99, 102, 241, 0.4);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-slate-950">
    <!-- Navigation -->
    <nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-gray-200/50 dark:border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">S</div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ScholarLink</h1>
                </a>
                <div class="flex gap-4 items-center">
                    <a href="/" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">Kembali</a>
                    <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md animate-fade">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700">
                <!-- Header -->
                <div class="gradient-bg text-white p-8 relative">
                    <div class="relative z-10">
                        <h3 class="text-3xl font-bold mb-2">Selamat Datang</h3>
                        <p class="text-indigo-200">Masuk untuk melanjutkan pencarian beasiswa Anda</p>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8 space-y-6">
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required
                                class="form-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                placeholder="nama@example.com"
                                value="{{ old('email') }}"
                            >
                            @error('email')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Password</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="form-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                placeholder="••••••••"
                            >
                            @error('password')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between text-sm">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 rounded cursor-pointer">
                                <span class="text-gray-700 dark:text-gray-300">Ingat saya</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Lupa password?</a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button
                            type="submit"
                            class="w-full btn-primary text-white font-bold py-3 rounded-lg transition duration-200"
                        >
                            Masuk Sekarang
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px bg-gray-200 dark:bg-slate-700"></div>
                        <span class="text-sm text-gray-500 dark:text-slate-400">atau</span>
                        <div class="flex-1 h-px bg-gray-200 dark:bg-slate-700"></div>
                    </div>

                    <!-- Social Login -->
                    <button type="button" class="w-full flex items-center justify-center gap-3 border-2 border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-300 font-semibold py-3 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span>Masuk dengan Google</span>
                    </button>
                </div>

                <!-- Footer -->
                <div class="px-8 py-6 bg-gray-50 dark:bg-slate-700/50 border-t border-gray-100 dark:border-slate-700 text-center">
                    <p class="text-gray-600 dark:text-gray-300">Belum memiliki akun? 
                        <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:text-indigo-700">Daftar di sini</a>
                    </p>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 p-6 bg-white dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-slate-700">
                <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-4">✨ Keuntungan Login</h4>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li class="flex gap-2">
                        <span>✓</span>
                        <span>Akses ke 1000+ beasiswa eksklusif</span>
                    </li>
                    <li class="flex gap-2">
                        <span>✓</span>
                        <span>Kelola aplikasi Anda dengan mudah</span>
                    </li>
                    <li class="flex gap-2">
                        <span>✓</span>
                        <span>Dapatkan rekomendasi personal</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
