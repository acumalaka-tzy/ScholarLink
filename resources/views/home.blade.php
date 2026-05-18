<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScholarLink - Platform Beasiswa Terpercaya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .gradient-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
        }
        
        .gradient-hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            border-radius: 50%;
        }
        
        .gradient-hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, transparent 70%);
            bottom: -50px;
            left: -50px;
            border-radius: 50%;
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #63f 0%, #a85eff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .card-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
            z-index: 0;
        }
        
        .card-hover:hover::before {
            left: 100%;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.2);
            transition: left 0.4s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(99, 102, 241, 0.4);
        }
        
        .featured-scholarship {
            background: linear-gradient(135deg, #ec4899 0%, #f59e0b 100%);
            position: relative;
            overflow: hidden;
        }
        
        .featured-scholarship::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            top: -150px;
            right: -150px;
            border-radius: 50%;
        }
        
        .animate-fade {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .animate-fade-delay {
            animation: fadeInUp 0.8s ease-out 0.2s both;
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
        
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
            transition: all 0.3s ease;
        }
        
        .card-hover:hover .feature-icon {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            transform: scale(1.1);
        }
        
        .stat-number {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #a855f7);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-white dark:bg-slate-950">
    <!-- Navigation -->
    <nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-200/50 dark:border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg">
                        S
                    </div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ScholarLink</h1>
                </div>
                <div class="hidden md:flex gap-8 items-center">
                    <a href="#features" class="nav-link text-gray-700 dark:text-gray-300 font-medium hover:text-indigo-600">Fitur</a>
                    <a href="#scholarships" class="nav-link text-gray-700 dark:text-gray-300 font-medium hover:text-indigo-600">Beasiswa</a>
                    <a href="#" class="nav-link text-gray-700 dark:text-gray-300 font-medium hover:text-indigo-600">Tentang</a>
                </div>
                <div class="flex gap-3 items-center">

    @auth

        @if (Auth::user()->role == 'admin')

            <a href="{{ route('admin.dashboard') }}"
               class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">

                Dashboard

            </a>

        @elseif (Auth::user()->role == 'provider')

            <a href="{{ route('provider.dashboard') }}"
               class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">

                Dashboard

            </a>

        @else

            <a href="{{ route('dashboard') }}"
               class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">

                Dashboard

            </a>

        @endif

        <form method="POST"
              action="{{ route('logout') }}"
              style="display: inline;">

            @csrf

            <button type="submit"
                    class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium">

                Logout

            </button>

        </form>

    @else

        <a href="{{ route('login') }}"
           class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium px-4 py-2 rounded-lg transition">

            Masuk

        </a>

        <a href="{{ route('register') }}"
           class="btn-primary text-white px-6 py-2 rounded-lg font-medium">

            Daftar

        </a>

    @endauth

</div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-hero text-white py-24 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 hero-content">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-fade">
                    <div class="inline-block mb-4 px-4 py-2 rounded-full bg-indigo-500/20 border border-indigo-400/50">
                        <span class="text-sm font-semibold text-indigo-300">🎓 Platform Beasiswa Terpercaya</span>
                    </div>
                    <h2 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                        Raih <span class="gradient-text">Mimpi Pendidikan</span> Anda
                    </h2>
                    <p class="text-xl text-slate-300 mb-8 leading-relaxed">
                        Temukan dan daftarkan diri Anda untuk ribuan peluang beasiswa dari universitas terkemuka di seluruh dunia.
                    </p>
                    @auth
                        <div class="flex gap-4 flex-wrap">
                            <a href="#scholarships" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-slate-100 transition transform hover:scale-105">Lihat Beasiswa</a>
                            <a href="{{ route('dashboard') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white/10 transition">Dashboard Saya</a>
                        </div>
                    @else
                        <div class="flex gap-4 flex-wrap">
                            <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-slate-100 transition transform hover:scale-105">Mulai Sekarang</a>
                            <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white/10 transition">Masuk</a>
                        </div>
                    @endauth
                    <div class="mt-12 flex gap-8 text-sm">
                        <div>
                            <p class="text-slate-300">Pengguna Aktif</p>
                            <p class="text-2xl font-bold">10,000+</p>
                        </div>
                        <div>
                            <p class="text-slate-300">Beasiswa Tersedia</p>
                            <p class="text-2xl font-bold">1,000+</p>
                        </div>
                        <div>
                            <p class="text-slate-300">Penerima Beasiswa</p>
                            <p class="text-2xl font-bold">500+</p>
                        </div>
                    </div>
                </div>
                <div class="animate-fade-delay hidden md:block">
                    <div class="relative h-96 rounded-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-600/20 backdrop-blur-3xl"></div>
                        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="200" cy="200" r="150" fill="url(#grad1)" opacity="0.1"/>
                            <rect x="100" y="100" width="200" height="200" fill="url(#grad2)" opacity="0.1" rx="20"/>
                            <defs>
                                <radialGradient id="grad1" cx="50%" cy="50%" r="50%">
                                    <stop offset="0%" style="stop-color:#6366f1;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#a855f7;stop-opacity:1" />
                                </radialGradient>
                                <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#ec4899;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <g opacity="0.3">
                                <circle cx="150" cy="150" r="40" fill="none" stroke="currentColor" stroke-width="2"/>
                                <circle cx="250" cy="250" r="60" fill="none" stroke="currentColor" stroke-width="2"/>
                                <path d="M 150 150 L 250 250" stroke="currentColor" stroke-width="1" stroke-dasharray="5,5"/>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 md:py-28 bg-gradient-to-b from-white via-slate-50 to-white dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Memilih ScholarLink?</h3>
                <p class="text-xl text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">Kami menyediakan semua yang Anda butuhkan untuk menemukan dan mendapatkan beasiswa impian</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group card-hover bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-slate-700">
                    <div class="feature-icon mb-6">🎯</div>
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">1000+ Beasiswa</h4>
                    <p class="text-gray-600 dark:text-slate-400 leading-relaxed">Ribuan peluang beasiswa dari universitas terkemuka di Indonesia dan seluruh dunia</p>
                </div>
                <div class="group card-hover bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-slate-700">
                    <div class="feature-icon mb-6">🔒</div>
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Aman & Terpercaya</h4>
                    <p class="text-gray-600 dark:text-slate-400 leading-relaxed">Data pribadi Anda dilindungi dengan enkripsi tingkat enterprise dan verifikasi berlapis</p>
                </div>
                <div class="group card-hover bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-slate-700">
                    <div class="feature-icon mb-6">⚡</div>
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Proses Cepat</h4>
                    <p class="text-gray-600 dark:text-slate-400 leading-relaxed">Sistem otomatis kami memproses aplikasi dengan cepat dan transparan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Scholarships -->
    <section id="scholarships" class="py-20 md:py-28 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Katalog Beasiswa Terlengkap</h3>
                <p class="text-xl text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">Temukan ribuan peluang beasiswa dari universitas terkemuka</p>
            </div>

            @if($scholarships->count() > 0)
                <!-- Featured Scholarships Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach($scholarships->take(6) as $scholarship)
                        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden card-hover border border-gray-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-600 transition">
                            <!-- Header -->
                            <div class="h-24 bg-gradient-to-r {{ $scholarship->is_featured ? 'from-indigo-500 to-purple-600' : 'from-blue-500 to-cyan-600' }} relative overflow-hidden">
                                <div class="absolute inset-0 opacity-10">
                                    <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1200 120"><path d="M0,0 Q300,50 600,0 T1200,0 L1200,120 L0,120 Z" fill="currentColor"></path></svg>
                                </div>
                                @if($scholarship->is_featured)
                                    <div class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                                        ⭐ Unggulan
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">{{ $scholarship->name }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $scholarship->university }} • {{ $scholarship->location }}</p>
                                
                                <!-- Details Grid -->
                                <div class="grid grid-cols-2 gap-3 mb-6">
                                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 p-3 rounded-lg">
                                        <p class="text-gray-600 dark:text-gray-400 text-xs font-semibold mb-1">JENJANG</p>
                                        <p class="text-gray-900 dark:text-white font-bold text-sm">
                                            @switch($scholarship->level)
                                                @case('sma') SMA @break
                                                @case('d3') Diploma 3 @break
                                                @case('s1') Strata 1 @break
                                                @case('s2') Strata 2 @break
                                                @case('s3') Strata 3 @break
                                                @default {{ $scholarship->level }}
                                            @endswitch
                                        </p>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-3 rounded-lg">
                                        <p class="text-gray-600 dark:text-gray-400 text-xs font-semibold mb-1">BENEFIT</p>
                                        <p class="text-gray-900 dark:text-white font-bold text-sm">{{ $scholarship->benefit_type }}</p>
                                    </div>
                                </div>

                                <!-- Deadline -->
                                <div class="flex items-center gap-2 mb-6 text-sm">
                                    <span class="text-red-600 dark:text-red-400 font-bold">📅</span>
                                    <span class="text-gray-700 dark:text-gray-300">
                                        @if($scholarship->deadline->isPast())
                                            <span class="text-red-600 dark:text-red-400 font-semibold">Sudah Ditutup</span>
                                        @else
                                            <span class="text-green-600 dark:text-green-400">{{ $scholarship->deadline->format('d M Y') }}</span>
                                        @endif
                                    </span>
                                </div>

                                <!-- Status Badge & Button -->
                                <div class="flex gap-2">
                                    @if($scholarship->available_slots)
                                        <span class="inline-block bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 px-3 py-1 rounded-full text-xs font-semibold">
                                            {{ $scholarship->available_slots }} Kuota
                                        </span>
                                    @endif
                                </div>
                                
                                @auth
                                    <button class="w-full mt-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-2 rounded-lg font-semibold transition transform hover:scale-105">
                                        Lihat Detail & Daftar →
                                    </button>
                                @else
                                    <button class="w-full mt-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-2 rounded-lg font-semibold transition transform hover:scale-105">
                                        Lihat Detail →
                                    </button>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div class="text-center">
                    @if($scholarships->count() > 6)
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-block px-8 py-3 border-2 border-indigo-600 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400 rounded-lg font-bold hover:bg-indigo-50 dark:hover:bg-slate-800 transition">
                                Lihat Semua Beasiswa ({{ $scholarships->count() }}) →
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-block px-8 py-3 border-2 border-indigo-600 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400 rounded-lg font-bold hover:bg-indigo-50 dark:hover:bg-slate-800 transition">
                                Lihat Semua Beasiswa ({{ $scholarships->count() }}) →
                            </a>
                        @endauth
                    @endif
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 dark:bg-slate-800/50 rounded-2xl border-2 border-dashed border-gray-300 dark:border-slate-700">
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Data beasiswa sedang dimuat...</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats Section -->
    <section class="gradient-hero text-white py-20 md:py-28 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-10 right-10 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="group">
                    <p class="stat-number">50+</p>
                    <p class="text-slate-300 text-lg mt-2 group-hover:text-white transition">Universitas Mitra</p>
                </div>
                <div class="group">
                    <p class="stat-number">1000+</p>
                    <p class="text-slate-300 text-lg mt-2 group-hover:text-white transition">Beasiswa Aktif</p>
                </div>
                <div class="group">
                    <p class="stat-number">10K+</p>
                    <p class="text-slate-300 text-lg mt-2 group-hover:text-white transition">Peserta Aktif</p>
                </div>
                <div class="group">
                    <p class="stat-number">500+</p>
                    <p class="text-slate-300 text-lg mt-2 group-hover:text-white transition">Penerima Beasiswa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 md:py-28 bg-gradient-to-b from-white via-indigo-50 to-white dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Proses Sederhana 4 Langkah</h3>
                <p class="text-xl text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">Mulai dari mendaftar hingga mendapatkan beasiswa impian Anda</p>
            </div>
            <div class="grid md:grid-cols-4 gap-6 relative">
                <div class="hidden md:block absolute top-1/4 left-0 right-0 h-1 bg-gradient-to-r from-indigo-300 to-purple-300"></div>
                <div class="text-center relative">
                    <div class="bg-linear-to-br from-indigo-500 to-purple-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 text-3xl font-bold shadow-lg">1</div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Daftar</h4>
                    <p class="text-gray-600 dark:text-slate-400 text-sm">Buat akun dan lengkapi profil akademik Anda dengan detail lengkap</p>
                </div>
                <div class="text-center relative">
                    <div class="bg-linear-to-br from-indigo-500 to-purple-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 text-3xl font-bold shadow-lg">2</div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Cari</h4>
                    <p class="text-gray-600 dark:text-slate-400 text-sm">Jelajahi ribuan beasiswa dengan filter sesuai kriteria Anda</p>
                </div>
                <div class="text-center relative">
                    <div class="bg-linear-to-br from-indigo-500 to-purple-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 text-3xl font-bold shadow-lg">3</div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Lamar</h4>
                    <p class="text-gray-600 dark:text-slate-400 text-sm">Kirim aplikasi Anda dengan dokumen dan esai yang kuat</p>
                </div>
                <div class="text-center relative">
                    <div class="bg-linear-to-br from-indigo-500 to-purple-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 text-3xl font-bold shadow-lg">4</div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3 text-lg">Raih</h4>
                    <p class="text-gray-600 dark:text-slate-400 text-sm">Dapatkan keputusan dan mulai perjalanan akademik Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-28 bg-white dark:bg-slate-950">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">Siap Mengubah Masa Depan?</h3>
            <p class="text-xl text-gray-600 dark:text-slate-400 mb-8 leading-relaxed">
                Bergabunglah dengan ribuan pelajar yang telah menemukan dan mendapatkan beasiswa impian mereka melalui ScholarLink
            </p>
            @auth
                <a href="{{ route('dashboard') }}" class="btn-primary text-white px-10 py-4 rounded-lg font-bold inline-block text-lg">Jelajahi Beasiswa Sekarang</a>
            @else
                <a href="{{ route('register') }}" class="btn-primary text-white px-10 py-4 rounded-lg font-bold inline-block text-lg">Daftar Gratis Sekarang</a>
            @endauth
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 text-white py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">S</div>
                        <h4 class="font-bold text-lg">ScholarLink</h4>
                    </div>
                    <p class="text-slate-400 text-sm">Platform terpercaya untuk menemukan beasiswa impian Anda</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Produk</h4>
                    <ul class="text-slate-400 text-sm space-y-2">
                        <li><a href="#" class="hover:text-white transition">Cari Beasiswa</a></li>
                        <li><a href="#" class="hover:text-white transition">Dashboard</a></li>
                        <li><a href="#" class="hover:text-white transition">Tips & Trik</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Perusahaan</h4>
                    <ul class="text-slate-400 text-sm space-y-2">
                        <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Karir</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <ul class="text-slate-400 text-sm space-y-2">
                        <li>📧 info@scholarlink.id</li>
                        <li>📱 +62 812-3456-7890</li>
                        <li>📍 Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center text-slate-400 text-sm">
                <p>&copy; 2026 ScholarLink. Semua hak dilindungi. | <a href="#" class="hover:text-white transition">Privasi</a> | <a href="#" class="hover:text-white transition">Syarat</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>
