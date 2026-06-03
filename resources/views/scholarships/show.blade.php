@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-4 md:px-10">
    <div class="max-w-6xl mx-auto">
        {{-- Back Button --}}
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('scholarships.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Beasiswa
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-xl p-6 sm:p-8 md:p-12">
            
            {{-- Header & Title --}}
            <div class="mb-6 sm:mb-8">
                <span class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-black mb-3 sm:mb-4">
                    <i class="bi bi-mortarboard-fill"></i> {{ $scholarship->category->nama_kategori ?? 'Umum' }}
                </span>
                <h1 class="text-2xl sm:text-4xl md:text-6xl font-black text-gray-900 mb-2 sm:mb-4 leading-tight">{{ $scholarship->nama_beasiswa }}</h1>
                <p class="text-gray-500 text-xs sm:text-lg font-bold">{{ $scholarship->deskripsi }}</p>
            </div>

            {{-- Info Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-8 sm:mb-10">
                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg sm:rounded-2xl border border-gray-100">
                    <p class="text-gray-400 font-bold text-xs uppercase">Provider</p>
                    <h3 class="text-base sm:text-xl font-black mt-2">{{ $scholarship->provider->nama_instansi ?? '-' }}</h3>
                </div>
                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg sm:rounded-2xl border border-gray-100">
                    <p class="text-gray-400 font-bold text-xs uppercase">Deadline</p>
                    <h3 class="text-base sm:text-xl font-black mt-2">{{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}</h3>
                </div>
            </div>

            {{-- Requirements & Benefits --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-8 sm:mb-10">
                <div class="bg-blue-50 p-4 sm:p-6 rounded-lg sm:rounded-2xl border border-blue-100">
                    <h2 class="font-black text-base sm:text-lg mb-3">Persyaratan</h2>
                    <p class="text-gray-600 text-xs sm:text-base leading-relaxed">{{ $scholarship->syarat }}</p>
                </div>
                <div class="bg-green-50 p-4 sm:p-6 rounded-lg sm:rounded-2xl border border-green-100">
                    <h2 class="font-black text-base sm:text-lg mb-3">Benefit</h2>
                    <p class="text-gray-600 text-xs sm:text-base leading-relaxed">{{ $scholarship->benefit }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                @auth
                    @if(auth()->user()->role == 'mahasiswa')
                        <form action="{{ route('applications.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_beasiswa" value="{{ $scholarship->id_beasiswa }}">
                            <button type="submit" class="w-full sm:w-auto bg-green-500 hover:bg-green-600 px-6 py-3 rounded-lg sm:rounded-2xl font-black text-white shadow-lg hover:shadow-xl transition text-sm sm:text-base">
                                <i class="bi bi-send-fill"></i> Apply Now
                            </button>
                        </form>

                        <a href="{{ route('chat-rooms.index.scholarship', $scholarship->id_beasiswa) }}" 
                            class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-2xl font-black text-white shadow-lg">
                                <i class="bi bi-chat-dots-fill"></i> Ruang Diskusi
                        </a>

                        <form action="{{ route('favorites.store', $scholarship->id_beasiswa) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-2xl font-black text-white shadow-lg">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </button>
                        </form>
                    @endif
                @endauth
                <a href="{{ route('scholarships.index') }}" class="bg-gray-100 hover:bg-gray-200 px-6 py-3 rounded-2xl font-black text-gray-700">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection