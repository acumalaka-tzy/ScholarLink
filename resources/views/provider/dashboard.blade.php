<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard - ScholarLink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.78);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .sidebar-link {
            transition: all 0.25s ease;
        }

        .sidebar-link:hover {
            transform: translateX(6px);
            background: rgba(99, 102, 241, 0.16);
            color: #ffffff;
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.28), rgba(168, 85, 247, 0.28));
            color: #ffffff;
            border: 1px solid rgba(129, 140, 248, 0.45);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 45px rgba(0, 0, 0, 0.28);
        }

        .gradient-text {
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 50%, #fb7185 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .mobile-sidebar {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-950 text-white">

    @php
        $totalScholarships = $totalScholarships ?? 0;
        $activeScholarships = $activeScholarships ?? 0;
        $totalApplications = $totalApplications ?? 0;
        $recentApplications = $recentApplications ?? collect();

        $providerName = auth()->user()->name ?? 'Provider Scholarship';
    @endphp

    <div class="min-h-screen flex">

        <!-- Mobile Overlay -->
        <div id="overlay" class="fixed inset-0 bg-black/60 z-40 hidden lg:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="mobile-sidebar fixed lg:static inset-y-0 left-0 z-50 w-72 bg-slate-950 border-r border-slate-800 transform -translate-x-full lg:translate-x-0 flex flex-col">

            <div class="p-8 border-b border-slate-800">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl shadow-lg shadow-purple-500/30">
                        S
                    </div>

                    <div>
                        <h1 class="text-3xl font-black gradient-text">
                            ScholarLink
                        </h1>
                        <p class="text-sm text-slate-400 mt-1">
                            Provider Area
                        </p>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-5 space-y-3">

                <a href="{{ route('provider.dashboard') }}" class="sidebar-link active flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">
                    <span class="text-2xl">📊</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('provider.scholarships.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">
                    <span class="text-2xl">🎓</span>
                    <span>Scholarships</span>
                </a>

                <a href="{{ route('provider.applications.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">
                    <span class="text-2xl">📄</span>
                    <span>Applications</span>
                </a>

                <a href={{ route('chat-rooms.index') }} class="sidebar-link flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">
                    <span class="text-2xl">💬</span>
                    <span>Chat Rooms</span>
                </a>

                <a href="{{ url('/') }}" class="sidebar-link flex items-center gap-4 px-5 py-4 rounded-2xl text-slate-300 font-bold">
                    <span class="text-2xl">🏠</span>
                    <span>Home Website</span>
                </a>

            </nav>

            <div class="p-5 border-t border-slate-800">
                <div class="rounded-3xl bg-gradient-to-br from-indigo-600/35 to-purple-700/35 border border-indigo-400/25 p-5 mb-4">
                    <p class="text-sm text-slate-400">
                        Logged in as
                    </p>

                    <h3 class="text-lg font-black mt-2">
                        {{ $providerName }}
                    </h3>

                    <p class="text-sm text-indigo-300 mt-1">
                        Provider
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="w-full py-3 rounded-2xl bg-rose-500 hover:bg-rose-600 transition font-bold shadow-lg shadow-rose-500/25">
                        Logout
                    </button>
                </form>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-w-0">

            <!-- Topbar -->
            <header class="sticky top-0 z-30 bg-slate-950/85 backdrop-blur-xl border-b border-slate-800">
                <div class="px-5 lg:px-10 py-5 flex items-center justify-between">

                    <div class="flex items-center gap-4">
                        <button id="openSidebar" class="lg:hidden w-11 h-11 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center">
                            ☰
                        </button>

                        <div>
                            <h2 class="text-2xl lg:text-3xl font-black">
                                Provider Panel
                            </h2>
                            <p class="text-slate-400 text-sm lg:text-base mt-1">
                                Manage scholarships, applications, and student communication
                            </p>
                        </div>
                    </div>

                    <div class="hidden sm:flex items-center gap-4">
                        <div class="text-right">
                            <h3 class="font-bold">
                                {{ $providerName }}
                            </h3>
                            <p class="text-sm text-slate-400">
                                Provider
                            </p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black text-xl shadow-lg shadow-purple-500/30">
                            {{ strtoupper(substr($providerName, 0, 1)) }}
                        </div>
                    </div>

                </div>
            </header>

            <!-- Content -->
            <section class="p-5 lg:p-10">

                <!-- Welcome -->
                <div class="mb-8 lg:mb-10">
                    <div class="glass-card rounded-3xl p-7 lg:p-10 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl"></div>

                        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                            <div>
                                <p class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-500/15 border border-indigo-400/25 text-indigo-300 text-sm font-semibold mb-5">
                                    🚀 Provider Dashboard
                                </p>

                                <h1 class="text-4xl lg:text-5xl font-black leading-tight">
                                    Selamat Datang di <span class="gradient-text">ScholarLink</span>
                                </h1>

                                <p class="text-slate-300 mt-4 max-w-2xl">
                                    Kelola beasiswa, pantau lamaran mahasiswa, dan berinteraksi melalui fitur yang tersedia di panel provider.
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('provider.scholarships.create') }}" class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold shadow-lg shadow-indigo-500/25">
                                    + Tambah Beasiswa
                                </a>

                                <a href="{{ route('provider.applications.index') }}" class="px-6 py-3 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 transition font-bold">
                                    Lihat Lamaran
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-6 mb-8 lg:mb-10">

                    <a href="{{ route('provider.scholarships.index') }}" class="stat-card glass-card rounded-3xl p-7 block">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-indigo-500/15 flex items-center justify-center text-3xl">
                                🎓
                            </div>

                            <span class="text-xs px-3 py-1 rounded-full bg-indigo-500/15 text-indigo-300 border border-indigo-400/20">
                                Scholarships
                            </span>
                        </div>

                        <p class="text-slate-400 font-medium">
                            Total Scholarships
                        </p>

                        <h3 class="text-5xl font-black mt-2">
                            {{ $totalScholarships }}
                        </h3>
                    </a>

                    <a href="{{ route('provider.scholarships.index') }}" class="stat-card glass-card rounded-3xl p-7 block">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 flex items-center justify-center text-3xl">
                                ✅
                            </div>

                            <span class="text-xs px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-400/20">
                                Active
                            </span>
                        </div>

                        <p class="text-slate-400 font-medium">
                            Active Scholarships
                        </p>

                        <h3 class="text-5xl font-black mt-2 text-emerald-400">
                            {{ $activeScholarships }}
                        </h3>
                    </a>

                    <a href="{{ route('provider.applications.index') }}" class="stat-card glass-card rounded-3xl p-7 block sm:col-span-2 xl:col-span-1">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-purple-500/15 flex items-center justify-center text-3xl">
                                📄
                            </div>

                            <span class="text-xs px-3 py-1 rounded-full bg-purple-500/15 text-purple-300 border border-purple-400/20">
                                Applications
                            </span>
                        </div>

                        <p class="text-slate-400 font-medium">
                            Total Applications
                        </p>

                        <h3 class="text-5xl font-black mt-2 text-indigo-400">
                            {{ $totalApplications }}
                        </h3>
                    </a>

                </div>

                <!-- Quick Access -->
                <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 lg:gap-6 mb-8 lg:mb-10">

                    <a href="{{ route('provider.scholarships.index') }}" class="glass-card rounded-3xl p-6 hover:bg-indigo-500/10 transition group">
                        <div class="text-4xl mb-5 group-hover:scale-110 transition">
                            🎓
                        </div>

                        <h3 class="text-xl font-black mb-2">
                            Manage Scholarships
                        </h3>

                        <p class="text-slate-400 text-sm">
                            Tambah, edit, hapus, dan pantau beasiswa yang kamu kelola.
                        </p>
                    </a>

                    <a href="{{ route('provider.scholarships.create') }}" class="glass-card rounded-3xl p-6 hover:bg-emerald-500/10 transition group">
                        <div class="text-4xl mb-5 group-hover:scale-110 transition">
                            ➕
                        </div>

                        <h3 class="text-xl font-black mb-2">
                            Add Scholarship
                        </h3>

                        <p class="text-slate-400 text-sm">
                            Buat program beasiswa baru untuk mahasiswa.
                        </p>
                    </a>

                    <a href="{{ route('provider.applications.index') }}" class="glass-card rounded-3xl p-6 hover:bg-purple-500/10 transition group">
                        <div class="text-4xl mb-5 group-hover:scale-110 transition">
                            📋
                        </div>

                        <h3 class="text-xl font-black mb-2">
                            Review Applications
                        </h3>

                        <p class="text-slate-400 text-sm">
                            Lihat dan proses lamaran mahasiswa.
                        </p>
                    </a>

                    <a href="{{ route('chat-rooms.index') }}" class="glass-card rounded-3xl p-6 hover:bg-pink-500/10 transition group">
                        <div class="text-4xl mb-5 group-hover:scale-110 transition">
                            💬
                        </div>

                        <h3 class="text-xl font-black mb-2">
                            Chat Rooms
                        </h3>

                        <p class="text-slate-400 text-sm">
                            Akses ruang komunikasi dengan pengguna.
                        </p>
                    </a>

                </div>

                <!-- Recent Applications -->
                <div class="glass-card rounded-3xl p-6 lg:p-8">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">
                        <div>
                            <h2 class="text-2xl lg:text-3xl font-black">
                                Recent Applications
                            </h2>
                            <p class="text-slate-400 mt-1">
                                Daftar mahasiswa yang baru apply
                            </p>
                        </div>

                        <a href="{{ route('provider.applications.index') }}" class="px-5 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold text-center">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[760px]">
                            <thead>
                                <tr class="border-b border-slate-700 text-left text-slate-300">
                                    <th class="py-4 px-3">Mahasiswa</th>
                                    <th class="py-4 px-3">Scholarship</th>
                                    <th class="py-4 px-3">Status</th>
                                    <th class="py-4 px-3">Tanggal</th>
                                    <th class="py-4 px-3 text-right">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($recentApplications as $application)
                                    <tr class="border-b border-slate-800 hover:bg-slate-800/45 transition">
                                        <td class="py-4 px-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black">
                                                    {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}
                                                </div>

                                                <div>
                                                    <p class="font-bold">
                                                        {{ $application->user->name ?? 'Mahasiswa' }}
                                                    </p>
                                                    <p class="text-xs text-slate-400">
                                                        {{ $application->user->email ?? '-' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="py-4 px-3">
                                            {{ $application->scholarship->nama_beasiswa ?? '-' }}
                                        </td>

                                        <td class="py-4 px-3">
                                            @if($application->status === 'approved')
                                                <span class="px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 text-xs font-bold border border-emerald-400/20">
                                                    Approved
                                                </span>
                                            @elseif($application->status === 'rejected')
                                                <span class="px-3 py-1 rounded-full bg-rose-500/15 text-rose-300 text-xs font-bold border border-rose-400/20">
                                                    Rejected
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full bg-yellow-500/15 text-yellow-300 text-xs font-bold border border-yellow-400/20">
                                                    Pending
                                                </span>
                                            @endif
                                        </td>

                                        <td class="py-4 px-3 text-slate-300">
                                            {{ $application->created_at ? $application->created_at->format('d M Y H:i') : '-' }}
                                        </td>

                                        <td class="py-4 px-3 text-right">
                                            <a href="{{ route('provider.applications.show', $application->id_application) }}" class="inline-flex px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 transition font-semibold text-sm">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-12 text-center">
                                            <div class="text-5xl mb-4">📭</div>
                                            <p class="font-bold text-lg">Belum ada lamaran masuk</p>
                                            <p class="text-slate-400 mt-1">Lamaran mahasiswa akan muncul di sini.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </section>

        </main>

    </div>

    <script>
        const openSidebar = document.getElementById('openSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        if (openSidebar && sidebar && overlay) {
            openSidebar.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }
    </script>

</body>
</html>