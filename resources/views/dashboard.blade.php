@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-6 lg:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <style>
        .dashboard-hero-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 2rem;
            width: 100%;
            position: relative;
            z-index: 10;
        }
        .responsive-profile-card {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .hero-buttons-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
        }

        @media (min-width: 1024px) {
            .dashboard-hero-container {
                flex-direction: row;
                justify-content: space-between;
                text-align: left;
            }
            .hero-buttons-container {
                justify-content: flex-start;
            }
            .responsive-profile-card {
                width: max-content;
                margin: 0;
            }
        }
    </style>

    <div class="relative overflow-hidden rounded-lg sm:rounded-[2.5rem] bg-gray-900 p-6 sm:p-12 md:p-16 min-h-[350px] md:min-h-[450px] flex items-center shadow-2xl mb-8 sm:mb-10 bg-cover" style="background-position: center 85%; background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0) 100%), url('{{ asset('images/student.png') }}');">
        <div class="absolute top-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-white/5 rounded-full blur-3xl"></div>
        
        <div class="dashboard-hero-container">
            <div class="max-w-3xl w-full">
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/20 text-white font-black text-xs sm:text-sm mb-3 sm:mb-6">
                    <div class="w-5 sm:w-6 h-5 sm:h-6 rounded-full bg-white text-blue-600 flex items-center justify-center text-xs">
                        <i class="bi bi-stars"></i>
                    </div>
                    Student Dashboard
                </div>
                <h2 class="text-2xl sm:text-4xl md:text-6xl font-black text-white leading-tight">
                    Selamat Datang, <span class="text-orange-100">{{ Auth::user()->display_name ?? Auth::user()->name }}</span>
                </h2>
                <p class="text-blue-50 text-xs sm:text-lg mt-3 sm:mt-6 max-w-2xl leading-relaxed font-bold">
                    Jelajahi peluang beasiswa terbaik dan pantau seluruh aplikasi Anda dalam satu dashboard modern dan profesional.
                </p>
                <div class="hero-buttons-container">
                    <a href="{{ route('scholarships.index') }}" class="px-4 sm:px-7 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-white text-blue-700 font-black shadow-xl hover:scale-[1.03] transition duration-300 text-xs sm:text-base">
                        <i class="bi bi-search mr-1 sm:mr-2"></i> <span class="hidden sm:inline">Explore Scholarship</span><span class="inline sm:hidden">Cari</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="px-4 sm:px-7 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl border border-white/30 bg-white/10 backdrop-blur-xl text-white font-black hover:bg-white/20 transition text-xs sm:text-base">
                        <i class="bi bi-person-fill mr-1 sm:mr-2"></i> <span class="hidden sm:inline">Edit Profile</span><span class="inline sm:hidden">Profile</span>
                    </a>
                </div>
            </div>
            <div class="responsive-profile-card bg-white/15 backdrop-blur-2xl border border-white/20 rounded-xl sm:rounded-[2rem] p-5 sm:p-7 shadow-2xl">
                <div class="flex items-center gap-3 sm:gap-5 mb-6 sm:mb-8">
                    @if(Auth::user()->profile?->foto_profil)
                        <img src="{{ asset('storage/' . Auth::user()->profile->foto_profil) }}" alt="Profile" class="w-14 sm:w-20 h-14 sm:h-20 rounded-2xl sm:rounded-3xl object-cover shadow-xl border-2 border-white/50">
                    @else
                        <div class="w-14 sm:w-20 h-14 sm:h-20 rounded-2xl sm:rounded-3xl bg-white text-blue-600 flex items-center justify-center text-2xl sm:text-4xl shadow-xl font-black">
                            {{ strtoupper(substr(Auth::user()->display_name ?? Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <h3 class="text-lg sm:text-2xl font-black text-white truncate max-w-[200px] sm:max-w-none">{{ Auth::user()->display_name ?? Auth::user()->name }}</h3>
                        <p class="text-blue-100 font-bold text-xs sm:text-base mt-1">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="space-y-3 sm:space-y-5">
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100 font-bold text-xs sm:text-base">Role</span>
                        <span class="bg-white/20 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black text-white">Mahasiswa</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100 font-bold text-xs sm:text-base">Status</span>
                        <span class="bg-green-400/20 text-green-100 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-black border border-green-200/20">Active</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-10">
        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-blue-600 bg-blue-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Scholarships</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Total Beasiswa</p>
            <h2 class="text-3xl sm:text-5xl font-black text-gray-900">{{ number_format($totalScholarships) }}</h2>
        </div>

        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-cyan-600 bg-cyan-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Applications</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Aplikasi Anda</p>
            <h2 class="text-3xl sm:text-5xl font-black text-gray-900">{{ number_format($totalApplications) }}</h2>
        </div>

        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 shadow-xl p-5 sm:p-7 hover:scale-[1.02] transition">
            <div class="flex items-center justify-between mb-4 sm:mb-6">
                <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-lg sm:rounded-3xl bg-green-100 text-green-600 flex items-center justify-center text-2xl sm:text-3xl">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <span class="text-xs sm:text-sm font-black text-green-600 bg-green-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full">Accepted</span>
            </div>
            <p class="text-gray-500 font-bold text-xs sm:text-sm mb-2">Diterima</p>
            <h2 class="text-3xl sm:text-5xl font-black text-green-600">{{ number_format($totalAccepted) }}</h2>
        </div>

    </div>

    <div class="gap-6 sm:gap-8">
        <div class="space-y-4 sm:space-y-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between flex-wrap gap-3 sm:gap-4">
                <div>
                    <h3 class="text-xl sm:text-3xl font-black text-gray-900">Aplikasi Beasiswa</h3>
                    <p class="text-gray-500 font-bold text-xs sm:text-base mt-1 sm:mt-2">Pantau seluruh progress pengajuan Anda.</p>
                </div>
                <a href="{{ route('scholarships.index') }}" class="px-4 sm:px-6 py-2.5 sm:py-4 rounded-lg sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition text-xs sm:text-base w-full sm:w-auto text-center sm:text-left">
                    <i class="bi bi-plus-circle-fill mr-1 sm:mr-2"></i> <span class="hidden sm:inline">Apply New</span><span class="inline sm:hidden">Apply</span>
                </a>
            </div>

            @if($applications->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($applications as $application)
                        <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 p-4 sm:p-8 shadow-xl hover:shadow-2xl transition duration-300 flex flex-col h-full">
                            <div class="flex-1">
                                <div class="mb-4 sm:mb-6">
                                    <span class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-black
                                        @if($application->status === 'diterima') bg-green-100 text-green-700 border border-green-200
                                        @elseif($application->status === 'ditolak') bg-red-100 text-red-700 border border-red-200
                                        @elseif($application->status === 'menunggu') bg-yellow-100 text-yellow-700 border border-yellow-200
                                        @else bg-blue-100 text-blue-700 border border-blue-200 @endif">
                                        @if($application->status === 'diterima')
                                            <i class="bi bi-check-circle-fill"></i> DITERIMA
                                        @elseif($application->status === 'ditolak')
                                            <i class="bi bi-x-circle-fill"></i> DITOLAK
                                        @elseif($application->status === 'menunggu')
                                            <i class="bi bi-clock-fill"></i> MENUNGGU
                                        @else
                                            <i class="bi bi-hourglass-split"></i> {{ ucfirst($application->status) }}
                                        @endif
                                    </span>
                                </div>
                                <h4 class="text-xl sm:text-2xl font-black text-gray-900 line-clamp-2">{{ $application->scholarship->nama_beasiswa ?? 'Beasiswa' }}</h4>
                                <p class="text-gray-500 font-bold text-sm sm:text-base mt-2">{{ $application->scholarship->provider->nama_provider ?? 'Provider' }}</p>
                            </div>
                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <a href="{{ route('applications.show', $application->id_application) }}" class="px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition text-sm sm:text-base w-full flex items-center justify-center gap-2">
                                    <i class="bi bi-eye-fill"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg sm:rounded-[2rem] border border-gray-100 p-8 sm:p-12 shadow-xl text-center">
                    <div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="bi bi-inbox text-blue-600 text-4xl"></i>
                    </div>
                    <h4 class="text-lg sm:text-2xl font-black text-gray-900 mb-3">Belum Ada Aplikasi</h4>
                    <p class="text-gray-500 font-bold text-sm sm:text-base mb-6">Mulai cari dan ajukan beasiswa impian Anda sekarang!</p>
                    <a href="{{ route('scholarships.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg sm:rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.02] transition">
                        <i class="bi bi-plus-circle-fill"></i> <span class="hidden sm:inline">Cari Beasiswa</span><span class="inline sm:hidden">Cari</span>
                    </a>
                </div>
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
