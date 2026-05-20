@extends('provider.provider')

@section('content')

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

                <a href="{{ route('provider.scholarships.create') }}"
                   class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold shadow-lg shadow-indigo-500/25">

                    + Tambah Beasiswa

                </a>

                <a href="{{ route('provider.applications.index') }}"
                   class="px-6 py-3 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 transition font-bold">

                    Lihat Lamaran

                </a>

            </div>

        </div>

    </div>

</div>

<!-- Stats -->
<div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-6 mb-8 lg:mb-10">

    <a href="{{ route('provider.scholarships.index') }}"
       class="glass-card rounded-3xl p-7 block hover:-translate-y-1 transition">

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

    <a href="{{ route('provider.scholarships.index') }}"
       class="glass-card rounded-3xl p-7 block hover:-translate-y-1 transition">

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

    <a href="{{ route('provider.applications.index') }}"
       class="glass-card rounded-3xl p-7 block hover:-translate-y-1 transition">

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

        <a href="{{ route('provider.applications.index') }}"
           class="px-5 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 transition font-bold text-center">

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

                            <a href="{{ route('provider.applications.show', $application->id_application) }}"
                               class="inline-flex px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 transition font-semibold text-sm">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="py-12 text-center">

                            <div class="text-5xl mb-4">📭</div>

                            <p class="font-bold text-lg">
                                Belum ada lamaran masuk
                            </p>

                            <p class="text-slate-400 mt-1">
                                Lamaran mahasiswa akan muncul di sini.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection