<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScholarLink - Platform Beasiswa</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800,900" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body, * {
            font-family: 'Nunito', sans-serif !important;
        }

        @keyframes floating {
            0%,100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .float-animation {
            animation: floating 5s ease-in-out infinite;
        }

        .fade-up {
            animation: fadeUp .8s ease forwards;
        }
    </style>
</head>
<body class="bg-[#f4f7f9] text-gray-900 antialiased selection:bg-blue-600 selection:text-white">
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-300/20 rounded-full blur-3xl"></div>
        <div class="absolute top-40 right-0 w-96 h-96 bg-orange-300/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl"></div>
    </div>

    @php
        $dashboardRoute = null;
        if (auth()->check()) {
            $dashboardRoute = match(auth()->user()->role) {
                'admin' => route('admin.dashboard'),
                'provider' => route('provider.dashboard'),
                default => route('dashboard'),
            };
        }
    @endphp

    <nav class="w-full bg-white/80 backdrop-blur-xl px-6 py-4 flex items-center justify-between shadow-lg border-b border-white/30 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center">
            
            <a href="#hero" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-lg flex items-center justify-center text-white font-black text-xl shadow-md">
                    S
                </div>
                <span class="text-2xl font-black tracking-tight text-gray-900">
                    ScholarLink
                </span>
            </a>

            <div class="hidden md:flex gap-8 items-center">
                <a href="#about" class="text-gray-600 font-bold hover:text-cyan-600 transition">Tentang</a>
                <a href="#scholarships" class="text-gray-600 font-bold hover:text-cyan-600 transition">Beasiswa</a>
                <a href="#steps" class="text-gray-600 font-bold hover:text-cyan-600 transition">Cara Kerja</a>
            </div>

            <div class="flex gap-4 items-center">
                @auth
                    <div class="hidden lg:flex gap-4 mr-4 border-r border-gray-200 pr-4">
                        @if(auth()->user()->role === 'mahasiswa')
                            <a href="{{ route('applications.index') }}" class="text-sm font-bold text-gray-600 hover:text-cyan-600">Application</a>
                            <a href="{{ route('documents.index') }}" class="text-sm font-bold text-gray-600 hover:text-cyan-600">Document</a>
                        @elseif(auth()->user()->role === 'provider')
                            <a href="{{ route('provider.scholarships.index') }}" class="text-sm font-bold text-gray-600 hover:text-cyan-600">Beasiswa Saya</a>
                        @elseif(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.users.index') }}" class="text-sm font-bold text-gray-600 hover:text-cyan-600">Users</a>
                        @endif
                    </div>

                    <a href="{{ $dashboardRoute }}" class="text-sm font-black text-gray-700 hover:text-cyan-600 transition">Dashboard</a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="border-2 border-red-100 text-red-500 px-4 py-2 rounded-full text-sm font-bold hover:bg-red-100 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-black text-gray-700 hover:text-cyan-600 hidden sm:block transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-6 py-2 rounded-full text-sm font-bold hover:from-blue-700 hover:to-cyan-700 transition shadow-md shadow-blue-600/20">
                        Daftar Gratis
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <section id ="hero" class="fade-up max-w-7xl mx-auto px-6 py-12 lg:py-20 relative overflow-hidden">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="max-w-xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-6 border border-orange-200">
                    <i class="bi bi-mortarboard-fill"></i> Platform Beasiswa Terpadu untuk Mahasiswa
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-black leading-tight mb-6 text-gray-900">
                    Temukan <br>
                    <span class="text-orange-600">Beasiswa Impian</span> <br>
                    Anda
                </h1>
                
                <p class="text-gray-600 mb-8 text-lg leading-relaxed max-w-md font-bold">
                    Temukan dan daftarkan diri Anda untuk berbagai peluang beasiswa dari instansi terpercaya. Kami bantu Anda wujudkan masa depan.
                </p>
                
                <div class="flex gap-4 flex-wrap">
                    @auth
                        <a href="#scholarships" class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-8 py-4 rounded-xl font-black hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 hover:-translate-y-1 hover:scale-105 shadow-lg shadow-blue-600/30">
                            Lihat Beasiswa
                        </a>
                        <a href="{{ $dashboardRoute }}" class="bg-white border-2 border-gray-200 text-gray-800 px-8 py-4 rounded-xl font-black hover:border-gray-300 transition">
                            Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-8 py-4 rounded-xl font-black hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 hover:-translate-y-1 hover:scale-105 shadow-lg shadow-blue-600/30">
                            Daftar Gratis
                        </a>
                        <a href="{{ route('login') }}" class="bg-white border-2 border-gray-200 text-gray-800 px-8 py-4 rounded-xl font-black hover:border-gray-300 transition">
                            Masuk Akun
                        </a>
                    @endauth
                </div>
            </div>

            <div class="relative bg-gradient-to-br from-cyan-200 via-[#d1e9f6] to-cyan-200 rounded-[3rem] p-8 flex justify-center items-center h-[500px]">
                <div class="absolute top-12 left-[-1rem] lg:left-[-2rem] bg-gradient-to-r from-orange-300 to-pink-300 rounded-2xl float-animation p-5 shadow-xl flex flex-col gap-1 z-10 float-animation" style="animation-duration: 3s;">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center font-black text-xl"><i class="bi bi-people-fill"></i></div>
                        <span class="font-black text-2xl text-gray-900">10,000+</span>
                    </div>
                    <p class="text-sm text-gray-700 font-bold">Pengguna Aktif</p>
                </div>

                <div class="absolute bottom-24 right-[-1rem] lg:right-[-2rem] bg-gradient-to-r from-blue-300 to-fuchsia-300 rounded-2xl float-animation p-5 shadow-xl flex flex-col gap-1 z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-black text-xl"><i class="bi bi-journals"></i></div>
                        <span class="font-black text-2xl text-gray-900">1,000+</span>
                    </div>
                    <p class="text-sm text-gray-700 font-bold">Beasiswa Tersedia</p>
                </div>

                <div class="absolute bottom-8 left-8 bg-gradient-to-r from-green-300 to-cyan-300 rounded-2xl float-animation p-4 shadow-xl flex items-center gap-3 z-10">
                    <div class="text-green-700">
                        <i class="bi bi-check-circle-fill text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-black text-lg text-gray-900 block">500+</span>
                        <span class="text-xs text-gray-700 font-bold">Penerima Beasiswa</span>
                    </div>
                </div>

                <div class="w-full h-full bg-white/60 backdrop-blur-lg rounded-3xl border-4 border-white/60 flex items-center justify-center shadow-2xl">
                    <span class="text-blue-500 font-black text-center px-4">
                        [Insert Vibrant Student Image Here]
                    </span>
                </div>
            </div>
        </div>
    </section>

    @auth
        @if(auth()->user()->role === 'mahasiswa')
            <section class="py-16 bg-white relative">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="text-center mb-12">
                        <h3 class="text-3xl font-black text-gray-900 mb-3">Menu Mahasiswa</h3>
                        <p class="text-gray-500 font-bold">Akses fitur pendaftaran beasiswa langsung dari halaman utama.</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <a href="{{ route('applications.index') }}" class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 flex flex-col">
                            <div class="w-14 h-14 bg-white text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-md border border-blue-100"><i class="bi bi-file-earmark-text-fill"></i></div>
                            <h4 class="text-xl font-black text-gray-900 mb-3">Application</h4>
                            <p class="text-gray-600 mb-6 text-sm flex-grow font-bold">Lihat status pendaftaran beasiswa yang sudah kamu ajukan.</p>
                            <span class="text-blue-700 font-black text-sm">Buka Application &rarr;</span>
                        </a>

                        <a href="{{ route('documents.index') }}" class="bg-gradient-to-br from-orange-100 to-magenta-100 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 flex flex-col">
                            <div class="w-14 h-14 bg-white text-orange-500 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-md border border-orange-100"><i class="bi bi-folder-fill"></i></div>
                            <h4 class="text-xl font-black text-gray-900 mb-3">Document</h4>
                            <p class="text-gray-600 mb-6 text-sm flex-grow font-bold">Upload dan kelola dokumen pendukung pendaftaran.</p>
                            <span class="text-orange-600 font-black text-sm">Buka Document &rarr;</span>
                        </a>

                        <a href="{{ route('favorites.index') }}" class="bg-gradient-to-br from-yellow-100 to-pink-100 rounded-3xl p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 flex flex-col">
                            <div class="w-14 h-14 bg-white text-yellow-500 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-md border border-yellow-100"><i class="bi bi-star-fill"></i></div>
                            <h4 class="text-xl font-black text-gray-900 mb-3">Favorites</h4>
                            <p class="text-gray-600 mb-6 text-sm flex-grow font-bold">Simpan dan lihat daftar beasiswa favorit kamu.</p>
                            <span class="text-pink-600 font-black text-sm">Buka Favorites &rarr;</span>
                        </a>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Kiri -->
                <div>

                    <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-6">
                        Menghubungkan Mahasiswa dengan Peluang Beasiswa Terbaik
                    </h2>

                    <p class="text-gray-600 text-lg leading-relaxed mb-5">
                        ScholarLink adalah platform yang menghubungkan mahasiswa dan penyedia beasiswa dalam satu sistem yang terintegrasi, sehingga proses pencarian, pendaftaran, dan pengelolaan beasiswa menjadi lebih mudah.
                    </p>

                    <p class="text-gray-600 text-lg leading-relaxed mb-5">
                        Kami percaya bahwa setiap mahasiswa berhak memperoleh akses yang setara terhadap informasi dan peluang pendidikan. Karena itu, ScholarLink hadir untuk membantu proses pencarian dan pengelolaan beasiswa menjadi lebih mudah, transparan, dan terorganisir.
                    </p>

                </div>

                <!-- Kanan -->
                <div>
                    <div class="bg-gradient-to-br from-blue-50 via-cyan-50 to-orange-50 rounded-[2rem] p-10 border border-blue-100">

                        <h3 class="text-2xl font-black text-gray-900 mb-8">
                            Apa yang Kami Hadirkan
                        </h3>

                        <div class="space-y-6">

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                                    <i class="bi-search"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-gray-900">
                                        Mempermudah Akses Informasi
                                    </h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Menyediakan informasi beasiswa yang mudah ditemukan dalam satu platform.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <i class="bi-mortarboard-fill"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-gray-900">
                                        Mendukung Pemerataan Pendidikan
                                    </h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Membantu lebih banyak mahasiswa menemukan peluang pendidikan yang sesuai.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
                                    <i class="bi-shield-check"></i>
                                </div>
                                <div>
                                    <h4 class="font-black text-gray-900">
                                        Menciptakan Proses yang Transparan
                                    </h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Mendukung proses pendaftaran dan pengelolaan beasiswa yang lebih terorganisir.
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="features" class="py-20 bg-[#f4f7f9] relative">
        <div class="absolute -top-12 -right-12 w-64 h-64 bg-cyan-100 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-orange-100 rounded-full blur-3xl opacity-60"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-black text-gray-900 mb-4">
                    Mengapa Memilih ScholarLink?
                </h3>

                <p class="text-gray-600 font-bold max-w-3xl mx-auto">
                    ScholarLink dirancang untuk membantu mahasiswa menemukan peluang beasiswa, mengelola pendaftaran, dan memantau proses seleksi dalam satu platform yang terintegrasi.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 hover:border-cyan-200 transition-all duration-500">
                    <div class="w-16 h-16 bg-blue-100 text-blue-700 rounded-2xl flex items-center justify-center text-3xl mb-6">
                        <i class="bi bi-search"></i>
                    </div>

                    <h4 class="text-xl font-black text-gray-900 mb-3">
                        Pencarian Terpusat
                    </h4>

                    <p class="text-gray-500 text-sm leading-relaxed font-bold">
                        Temukan berbagai program beasiswa dari banyak provider dalam satu tempat tanpa perlu mencari dari berbagai sumber secara terpisah.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 hover:border-cyan-200 transition-all duration-500">
                    <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center text-3xl mb-6">
                        <i class="bi bi-file-earmark-check"></i>
                    </div>

                    <h4 class="text-xl font-black text-gray-900 mb-3">
                        Pendaftaran Online
                    </h4>

                    <p class="text-gray-500 text-sm leading-relaxed font-bold">
                        Kirim pendaftaran dan kelola dokumen pendukung secara digital melalui proses yang lebih sederhana dan terorganisir.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 hover:border-cyan-200 transition-all duration-500">
                    <div class="w-16 h-16 bg-green-100 text-green-700 rounded-2xl flex items-center justify-center text-3xl mb-6">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <h4 class="text-xl font-black text-gray-900 mb-3">
                        Pemantauan Status
                    </h4>

                    <p class="text-gray-500 text-sm leading-relaxed font-bold">
                        Pantau perkembangan aplikasi beasiswa secara langsung sehingga proses seleksi lebih transparan dan mudah diikuti.
                    </p>
                </div>

            </div>
        </div>
    </section>
    
    <section id="scholarships" class="py-20 bg-[#fff8f8]">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-end mb-12">
                <div>
                    <h3 class="text-4xl font-black text-gray-900 mb-4">
                        Katalog Beasiswa Terbaru
                    </h3>
                    <p class="text-gray-600 font-bold">
                        Temukan peluang beasiswa aktif dari berbagai provider.
                    </p>
                </div>

                <a href="{{ route('scholarships.index') }}"
                    class="hidden md:inline-block border-2 border-orange-200 text-orange-700 px-6 py-2 rounded-full font-black hover:border-orange-600 hover:text-orange-600 transition">
                    Lihat Semua &rarr;
                </a>
            </div>

            @php $scholarships = $scholarships ?? collect(); @endphp

            @if($scholarships->count() > 0)

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">

                    @foreach($scholarships->take(6) as $scholarship)

                        @php
                            $deadline = $scholarship->deadline
                                ? \Carbon\Carbon::parse($scholarship->deadline)
                                : null;
                        @endphp

                        <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col h-full">

                            <!-- Header -->
                            <div class="relative bg-gradient-to-br from-blue-600 via-cyan-500 to-indigo-600 px-6 py-4 text-white">

                                <div class="absolute top-4 right-4">
                                    @if($scholarship->status === 'aktif')
                                        <span class="bg-white/20 backdrop-blur px-3 py-1 rounded-full text-xs font-black">
                                            🟢 Aktif
                                        </span>
                                    @elseif($scholarship->status === 'nonaktif')
                                        <span class="bg-yellow-500/30 backdrop-blur px-3 py-1 rounded-full text-xs font-black">
                                            🟡 Nonaktif
                                        </span>
                                    @else
                                        <span class="bg-red-500/30 backdrop-blur px-3 py-1 rounded-full text-xs font-black">
                                            🔴 Ditutup
                                        </span>
                                    @endif
                                </div>

                                <span class="inline-block bg-white/20 backdrop-blur px-3 py-1 rounded-full text-xs font-bold mb-3">
                                    {{ $scholarship->category->nama_kategori ?? 'Umum' }}
                                </span>

                                <h4 class="text-lg font-black leading-tight line-clamp-2">
                                    {{ $scholarship->nama_beasiswa }}
                                </h4>

                                <p class="text-blue-100 text-xs mt-1 font-semibold">
                                    {{ $scholarship->provider->nama_instansi ?? 'Provider' }}
                                </p>
                            </div>

                            <!-- Body -->
                            <div class="p-6 flex-grow">

                                <div class="bg-green-50 border border-green-100 rounded-2xl p-4 mb-5">
                                    <p class="text-xs font-black uppercase text-green-600 mb-1">
                                        Benefit
                                    </p>

                                    <p class="text-sm font-bold text-green-900 line-clamp-2">
                                        🎓 {{ $scholarship->benefit ?? 'Benefit belum tersedia' }}
                                    </p>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-calendar-event-fill"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-500 font-black uppercase">
                                            Deadline
                                        </p>

                                        <p class="font-bold {{ $deadline && $deadline->isPast() ? 'text-red-500' : 'text-gray-800' }}">
                                            {{ $deadline ? $deadline->format('d M Y') : 'Belum tersedia' }}
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- Footer -->
                            <div class="p-6 pt-0">

                                <a href="{{ route('scholarships.show', $scholarship->id_beasiswa) }}"
                                    class="block text-center w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white py-3.5 rounded-2xl font-black transition-all duration-300">

                                    @auth
                                        Lihat Detail & Daftar
                                    @else
                                        Lihat Detail
                                    @endauth

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="text-center md:hidden">
                    <a href="{{ route('scholarships.index') }}"
                        class="inline-block border-2 border-orange-200 text-orange-700 px-8 py-3 rounded-full font-black hover:border-orange-600 hover:text-orange-600 transition">
                        Lihat Semua Beasiswa
                    </a>
                </div>

            @else

                <div class="text-center py-16 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <p class="text-gray-500 font-bold text-lg">
                        Belum ada data beasiswa saat ini.
                    </p>
                </div>

            @endif

        </div>
    </section>

    <section id="steps" class="py-20 bg-[#f4f7f9] relative">
        <div class="absolute -top-12 -left-12 w-64 h-64 rounded-full blur-3xl opacity-30 bg-gradient-to-r from-cyan-300 to-magenta-300"></div>
        <div class="absolute -bottom-12 -right-12 w-64 h-64 rounded-full blur-3xl opacity-30 bg-gradient-to-r from-orange-300 to-green-300"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-black text-gray-900 mb-4">Cara Kerja ScholarLink</h3>
                <p class="text-gray-600 font-bold max-w-2xl mx-auto">Mulai dari mendaftar hingga mendapatkan beasiswa impian Anda.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 relative">
                <div class="hidden md:block absolute top-8 left-16 right-16 h-1 bg-gradient-to-r from-blue-200 via-orange-200 to-fuchsia-200 z-0 rounded-full"></div>

                <div class="text-center relative z-10">
                    <div class="bg-gradient-to-br from-blue-600 to-cyan-500 text-white rounded-2xl w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-black border-4 border-[#f4f7f9] shadow-md">1</div>
                    <h4 class="font-black text-gray-900 mb-2">Daftar</h4>
                    <p class="text-gray-600 font-bold text-sm">Buat akun & lengkapi data.</p>
                </div>
                <div class="text-center relative z-10">
                    <div class="bg-gradient-to-br from-orange-500 to-pink-500 text-white rounded-2xl w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-black border-4 border-[#f4f7f9] shadow-md">2</div>
                    <h4 class="font-black text-gray-900 mb-2">Temukan Beasiswa</h4>
                    <p class="text-gray-600 font-bold text-sm">Jelajahi berbagai program beasiswa yang sesuai dengan kebutuhan Anda.</p>
                </div>
                <div class="text-center relative z-10">
                    <div class="bg-gradient-to-br from-cyan-600 to-green-500 text-white rounded-2xl w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-black border-4 border-[#f4f7f9] shadow-md">3</div>
                    <h4 class="font-black text-gray-900 mb-2">Kirim Pendaftaran</h4>
                    <p class="text-gray-600 font-bold text-sm">Lengkapi persyaratan dan ajukan aplikasi secara online.</p>
                </div>
                <div class="text-center relative z-10">
                    <div class="bg-gradient-to-br from-fuchsia-600 to-purple-600 text-white rounded-2xl w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-black border-4 border-[#f4f7f9] shadow-md">4</div>
                    <h4 class="font-black text-gray-900 mb-2">Pantau Status</h4>
                    <p class="text-gray-600 font-bold text-sm">Lihat perkembangan proses seleksi melalui dashboard Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gradient-to-br from-blue-700 via-cyan-600 to-indigo-700 text-white text-center px-6">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-4xl md:text-5xl font-black mb-6">Siap Menemukan Beasiswa Impian Anda?</h3>
            <p class="text-blue-50 mb-10 text-lg font-bold leading-relaxed"> Bergabunglah dengan ScholarLink dan temukan berbagai peluang beasiswa dari institusi terpercaya dalam satu platform yang mudah digunakan.</p>
            @auth
                <a href="{{ $dashboardRoute }}" class="bg-white text-blue-700 px-10 py-4 rounded-xl font-black inline-block text-lg shadow-lg hover:scale-105 transition-all duration-500">
                    Jelajahi Beasiswa Sekarang
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-white text-blue-700 px-10 py-4 rounded-xl font-black inline-block text-lg shadow-lg hover:scale-105 transition-all duration-500">
                    Daftar Gratis Sekarang
                </a>
            @endauth
        </div>
    </section>

    <footer class="bg-gradient-to-br from-cyan-100 via-[#d1e9f6] to-cyan-100 text-gray-900 py-16 border-t border-cyan-200">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12 mb-12">
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-cyan-400 rounded-lg flex items-center justify-center text-white font-black">S</div>
                    <h4 class="font-black text-xl text-gray-900">ScholarLink</h4>
                </div>
                <p class="text-gray-700 text-sm font-bold leading-relaxed">Platform terpercaya dan bersemangat untuk menemukan beasiswa impian Anda.</p>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-6">Navigasi</h4>
                <ul class="text-gray-700 text-sm space-y-3 font-bold">
                    <li><a href="#about" class="hover:text-blue-600 transition">Tentang</a></li>
                    <li><a href="#scholarships" class="hover:text-blue-600 transition">Beasiswa</a></li>
                    <li><a href="#steps" class="hover:text-blue-600 transition">Cara Kerja</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-6">Platform</h4>
                <ul class="text-gray-700 text-sm space-y-3 font-bold">
                    <li>Mahasiswa</li>
                    <li>Provider Beasiswa</li>
                    <li>Manajemen Pendaftaran</li>
                    <li>Pemantauan Status</li>
                </ul>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-6">Kontak</h4>
                <ul class="text-gray-700 text-sm space-y-3 font-bold">
                    <li><i class="bi bi-envelope-fill mr-2 text-cyan-600"></i> info@scholarlink.id</li>
                    <li><i class="bi bi-telephone-fill mr-2 text-cyan-600"></i> +62 812-3456-7890</li>
                    <li><i class="bi bi-geo-alt-fill mr-2 text-cyan-600"></i> Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 border-t border-cyan-200 pt-8 text-center text-gray-600 text-sm font-black">
            &copy; 2026 ScholarLink. Semua hak dilindungi.
        </div>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
