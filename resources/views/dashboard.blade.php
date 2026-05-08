<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ScholarLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .gradient-sidebar {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
        }
        
        .stat-card-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
        }
        
        .application-card {
            transition: all 0.3s ease;
            border-left: 4px solid #6366f1;
        }
        
        .application-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
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
<body class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-950 dark:to-slate-900">
    <!-- Navigation -->
    <nav class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-200/50 dark:border-slate-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">
                        S
                    </div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ScholarLink</h1>
                </div>
                <div class="flex gap-6 items-center">
                    <span class="text-gray-700 dark:text-gray-300">
                        Halo, <strong>{{ Auth::user()->name }}</strong> 👋
                    </span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Welcome Section -->
        <div class="mb-12">
            <div class="bg-linear-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 md:p-12 text-white shadow-xl">
                <h2 class="text-4xl md:text-5xl font-bold mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-indigo-100 text-lg">Jelajahi beasiswa terbaru dan kelola aplikasi Anda dengan mudah</p>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="stat-card card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Beasiswa</p>
                        <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">1,250</p>
                    </div>
                    <span class="text-4xl">📚</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Tersedia untuk Anda</p>
            </div>

            <div class="stat-card card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Aplikasi Anda</p>
                        <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">3</p>
                    </div>
                    <span class="text-4xl">📋</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Sedang diproses</p>
            </div>

            <div class="stat-card card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Diterima</p>
                        <p class="text-4xl font-bold text-green-600 mt-2">1</p>
                    </div>
                    <span class="text-4xl">✅</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Beasiswa aktif</p>
            </div>

            <div class="stat-card-primary card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-indigo-200 text-sm font-medium">Profil Kelengkapan</p>
                        <p class="text-4xl font-bold mt-2">75%</p>
                    </div>
                    <span class="text-4xl">📊</span>
                </div>
                <p class="text-indigo-200 text-sm mt-4">Lengkapi profil Anda</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Left Column - My Applications -->
            <div class="md:col-span-2">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Aplikasi Beasiswa Saya</h3>
                
                <!-- Application Cards -->
                <div class="space-y-5 mb-6">
                    <!-- Application 1 - Accepted -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 card-hover border-l-4 border-green-500">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white">Beasiswa Penuh S1 - UI</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Universitas Indonesia • Jakarta</p>
                            </div>
                            <span class="badge badge-success">DITERIMA</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm mb-4">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Jenjang</p>
                                <p class="font-semibold text-gray-900 dark:text-white">S1</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Program</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Informatika</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Benefit</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Penuh + Hidup</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Keputusan</p>
                                <p class="font-semibold text-gray-900 dark:text-white">15 Mei 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <button class="px-4 py-2 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-lg font-medium hover:bg-indigo-200 transition text-sm">Lihat Detail</button>
                            <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm">Download</button>
                        </div>
                    </div>

                    <!-- Application 2 - Pending -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 card-hover border-l-4 border-blue-500">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white">Beasiswa Magister IT</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Institut Teknologi Bandung • Jawa Barat</p>
                            </div>
                            <span class="badge badge-info">MENUNGGU</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm mb-4">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Jenjang</p>
                                <p class="font-semibold text-gray-900 dark:text-white">S2</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Program</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Informatika</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Benefit</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Penuh + Riset</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Deadline</p>
                                <p class="font-semibold text-gray-900 dark:text-white">30 Juni 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <button class="px-4 py-2 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-lg font-medium hover:bg-indigo-200 transition text-sm">Lihat Detail</button>
                            <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm">Edit</button>
                        </div>
                    </div>

                    <!-- Application 3 - Rejected -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 card-hover border-l-4 border-red-500">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white">Beasiswa Penuh Universitas</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Universitas Gadjah Mada • Yogyakarta</p>
                            </div>
                            <span class="badge badge-danger">DITOLAK</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm mb-4">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Jenjang</p>
                                <p class="font-semibold text-gray-900 dark:text-white">S1</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Program</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Kedokteran</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Benefit</p>
                                <p class="font-semibold text-gray-900 dark:text-white">Penuh</p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-xs mb-1">Keputusan</p>
                                <p class="font-semibold text-gray-900 dark:text-white">20 April 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <button class="px-4 py-2 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-lg font-medium hover:bg-indigo-200 transition text-sm">Lihat Detail</button>
                            <button class="px-4 py-2 border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm">Cek Alasan</button>
                        </div>
                    </div>
                </div>

                <!-- View More Button -->
                <button class="w-full py-3 border-2 border-indigo-600 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400 rounded-lg font-bold hover:bg-indigo-50 dark:hover:bg-slate-700 transition">
                    Lihat Semua Aplikasi (5 Total) →
                </button>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="space-y-6">
                <!-- Profile Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">👤 Profil Saya</h4>
                    <div class="space-y-4">
                        <div class="pb-4 border-b border-gray-200 dark:border-slate-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Nama</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="pb-4 border-b border-gray-200 dark:border-slate-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Email</p>
                            <p class="font-semibold text-gray-900 dark:text-white truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="pb-4 border-b border-gray-200 dark:border-slate-700">
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">No. Telepon</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->phone ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Tingkat Pendidikan</p>
                            <p class="font-semibold text-gray-900 dark:text-white">
                                @switch(Auth::user()->education_level)
                                    @case('sma')
                                        SMA/Sederajat
                                        @break
                                    @case('d3')
                                        Diploma 3
                                        @break
                                    @case('s1')
                                        Strata 1
                                        @break
                                    @case('s2')
                                        Strata 2
                                        @break
                                    @case('s3')
                                        Strata 3
                                        @break
                                    @default
                                        —
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-2 border-2 border-indigo-600 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400 rounded-lg font-medium hover:bg-indigo-50 dark:hover:bg-slate-700 transition">
                        Edit Profil
                    </button>
                </div>

                <!-- Recommended Scholarships -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">✨ Rekomendasi untuk Anda</h4>
                    <div class="space-y-3">
                        <div class="p-4 bg-linear-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg cursor-pointer hover:shadow-md transition">
                            <p class="font-semibold text-gray-900 dark:text-white text-sm">Beasiswa S1 UI 2026</p>
                            <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">Deadline: 31 Desember</p>
                            <p class="text-indigo-600 dark:text-indigo-400 text-xs mt-2 font-bold">Sesuai untuk Anda →</p>
                        </div>
                        <div class="p-4 bg-linear-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg cursor-pointer hover:shadow-md transition">
                            <p class="font-semibold text-gray-900 dark:text-white text-sm">Beasiswa Luar Negeri</p>
                            <p class="text-gray-600 dark:text-gray-400 text-xs mt-1">Deadline: 15 Januari</p>
                            <p class="text-indigo-600 dark:text-indigo-400 text-xs mt-2 font-bold">Lihat Peluang →</p>
                        </div>
                    </div>
                </div>

                <!-- Tips & Tricks -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl shadow-lg p-6 border border-blue-200 dark:border-blue-800">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">💡 Tips Sukses</h4>
                    <ul class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <li class="flex gap-2">
                            <span class="text-lg">✓</span>
                            <span>Lengkapi profil untuk peluang lebih besar</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="text-lg">✓</span>
                            <span>Upload dokumen berkualitas tinggi</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="text-lg">✓</span>
                            <span>Ikuti panduan penulisan esai</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="text-lg">✓</span>
                            <span>Jangan tunda aplikasi hingga deadline</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 dark:bg-slate-950 text-white py-12 mt-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-400 text-sm">
            <p>&copy; 2026 ScholarLink. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
