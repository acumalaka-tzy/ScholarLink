@extends('provider.provider')

@section('content')
<div>

    <div class="max-w-7xl mx-auto">
        <div class="mb-10">
            <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)] p-8 lg:p-10">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                <div class="absolute top-0 right-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                    <div>
                        <div class="inline-flex items-center gap-3 bg-blue-50 border border-blue-100 rounded-full px-5 py-3 mb-6 shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-sm">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <span class="text-blue-700 text-sm font-black tracking-wide">Provider Dashboard</span>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-black leading-tight tracking-tight text-gray-900">
                            Welcome to <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">ScholarLink</span>
                        </h1>
                        <p class="text-gray-500 mt-5 max-w-3xl text-lg leading-relaxed font-bold">
                            Kelola scholarship, pantau application mahasiswa, dan berinteraksi dengan sistem provider modern ScholarLink secara profesional.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row flex-wrap gap-4">
                        <a href="{{ route('provider.scholarships.create') }}" class="group relative overflow-hidden inline-flex items-center justify-center w-full sm:w-[220px] gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98]">
                            <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                            <span class="relative flex items-center justify-center gap-3"><i class="bi bi-plus-circle-fill text-xl"></i> Tambah Beasiswa</span>
                        </a>
                        <a href="{{ route('provider.applications.index') }}" class="inline-flex items-center justify-center w-full sm:w-[220px] gap-3 bg-white border border-gray-200 hover:border-cyan-400 hover:bg-cyan-50 transition px-7 py-5 rounded-2xl font-black text-gray-700 shadow-lg">
                            <i class="bi bi-folder-check text-xl text-cyan-600"></i> Lihat Lamaran
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
            <a href="{{ route('provider.scholarships.index') }}" class="group relative overflow-hidden bg-white border border-gray-100 rounded-[2rem] p-7 shadow-[0_20px_60px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 to-cyan-500"></div>
                <div class="flex items-center justify-between mb-7">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-blue-100 text-blue-600 flex items-center justify-center text-3xl shadow-lg"><i class="bi bi-mortarboard-fill"></i></div>
                    <span class="text-xs px-4 py-2 rounded-full bg-blue-100 text-blue-700 border border-blue-200 font-black">Scholarships</span>
                </div>
                <p class="text-gray-500 font-bold">Total Scholarships</p>
                <h3 class="text-6xl font-black text-gray-900 mt-3">{{ $totalScholarships }}</h3>
            </a>

            <a href="{{ route('provider.scholarships.index') }}" class="group relative overflow-hidden bg-white border border-gray-100 rounded-[2rem] p-7 shadow-[0_20px_60px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-500 to-emerald-500"></div>
                <div class="flex items-center justify-between mb-7">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-green-100 text-green-600 flex items-center justify-center text-3xl shadow-lg"><i class="bi bi-check-circle-fill"></i></div>
                    <span class="text-xs px-4 py-2 rounded-full bg-green-100 text-green-700 border border-green-200 font-black">Active</span>
                </div>
                <p class="text-gray-500 font-bold">Active Scholarships</p>
                <h3 class="text-6xl font-black text-green-600 mt-3">{{ $activeScholarships }}</h3>
            </a>

            <a href="{{ route('provider.applications.index') }}" class="group relative overflow-hidden bg-white border border-gray-100 rounded-[2rem] p-7 shadow-[0_20px_60px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 to-fuchsia-500"></div>
                <div class="flex items-center justify-between mb-7">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-purple-100 text-purple-600 flex items-center justify-center text-3xl shadow-lg"><i class="bi bi-file-earmark-check-fill"></i></div>
                    <span class="text-xs px-4 py-2 rounded-full bg-purple-100 text-purple-700 border border-purple-200 font-black">Applications</span>
                </div>
                <p class="text-gray-500 font-bold">Total Applications</p>
                <h3 class="text-6xl font-black text-purple-600 mt-3">{{ $totalApplications }}</h3>
            </a>
        </div>

        <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
            <div class="p-6 lg:p-8 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-black text-gray-900">Recent Applications</h2>
                    <p class="text-gray-500 mt-2 font-bold">Daftar mahasiswa yang baru melakukan application</p>
                </div>
                <a href="{{ route('provider.applications.index') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:scale-[1.03] transition duration-300 px-6 py-4 rounded-2xl font-black text-white shadow-lg shadow-blue-500/20">
                    <i class="bi bi-arrow-right-circle-fill"></i> Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px]">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="py-5 px-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Mahasiswa</th>
                            <th class="py-5 px-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Scholarship</th>
                            <th class="py-5 px-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Status</th>
                            <th class="py-5 px-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Tanggal</th>
                            <th class="py-5 px-6 text-right text-sm font-black uppercase tracking-wider text-gray-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentApplications as $application)
                            <tr class="border-b border-gray-100 hover:bg-cyan-50/40 transition duration-300">
                                <td class="py-5 px-6">
                                    <div class="flex items-center gap-4">
                                        @if($application->user->profile && $application->user->profile->foto_profil)
                                            <img src="{{ Storage::url($application->user->profile->foto_profil) }}" alt="Profile" class="w-14 h-14 rounded-[1.2rem] object-cover shadow-xl shadow-blue-500/20">
                                        @else
                                            <div class="w-14 h-14 rounded-[1.2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xl font-black shadow-xl shadow-blue-500/20">
                                                {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="font-black text-gray-900 text-lg">{{ $application->user->name ?? 'Mahasiswa' }}</h3>
                                            <p class="text-sm text-gray-500 font-bold mt-1">{{ $application->user->email ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5 px-6"><p class="font-black text-gray-900">{{ $application->scholarship->nama_beasiswa ?? '-' }}</p></td>
                                <td class="py-5 px-6">
                                    @if($application->status === 'approved')
                                        <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-green-100 border border-green-200 text-green-700 font-black text-sm"><i class="bi bi-check-circle-fill"></i> Approved</span>
                                    @elseif($application->status === 'rejected')
                                        <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-red-100 border border-red-200 text-red-700 font-black text-sm"><i class="bi bi-x-circle-fill"></i> Rejected</span>
                                    @else
                                        <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-yellow-100 border border-yellow-200 text-yellow-700 font-black text-sm"><i class="bi bi-hourglass-split"></i> Pending</span>
                                    @endif
                                </td>
                                <td class="py-5 px-6 text-gray-500 font-bold">{{ $application->created_at ? $application->created_at->format('d M Y H:i:s') : '-' }}</td>
                                <td class="py-5 px-6 text-right">
                                    <a href="{{ route('provider.applications.show', $application->id_application) }}" class="inline-flex items-center gap-3 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition px-5 py-3 rounded-2xl font-black text-gray-700">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-24 px-6">
                                    <div class="flex flex-col items-center justify-center text-center">
                                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 border border-gray-200 flex items-center justify-center text-blue-600 text-7xl shadow-2xl shadow-blue-500/10 mb-10"><i class="bi bi-inbox-fill"></i></div>
                                        <h2 class="text-5xl font-black text-gray-900 mb-5">No Applications Yet</h2>
                                        <p class="text-gray-500 text-lg max-w-3xl leading-relaxed font-bold">Belum ada application mahasiswa. Semua application terbaru akan muncul di dashboard ini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
