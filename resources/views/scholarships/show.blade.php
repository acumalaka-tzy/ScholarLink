@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-10 px-4 md:px-10">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white border border-gray-100 rounded-[2.5rem] shadow-xl p-8 md:p-12">
            
            {{-- Header & Title --}}
            <div class="mb-8">
                <span class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 px-5 py-3 rounded-full text-sm font-black mb-4">
                    <i class="bi bi-mortarboard-fill"></i> {{ $scholarship->category->nama_kategori ?? 'Umum' }}
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-4">{{ $scholarship->nama_beasiswa }}</h1>
                <p class="text-gray-500 text-lg font-bold">{{ $scholarship->deskripsi }}</p>
            </div>

            {{-- Info Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <p class="text-gray-400 font-bold text-xs uppercase">Provider</p>
                    <h3 class="text-xl font-black">{{ $scholarship->provider->nama_instansi ?? '-' }}</h3>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <p class="text-gray-400 font-bold text-xs uppercase">Deadline</p>
                    <h3 class="text-xl font-black">{{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}</h3>
                </div>
            </div>

            {{-- Requirements & Benefits --}}
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <h2 class="font-black text-lg mb-3">Persyaratan</h2>
                    <p class="text-gray-600">{{ $scholarship->syarat }}</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <h2 class="font-black text-lg mb-3">Benefit</h2>
                    <p class="text-gray-600">{{ $scholarship->benefit }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap gap-3">
                @auth
                    @if(auth()->user()->role == 'mahasiswa')
                        <form action="{{ route('applications.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_beasiswa" value="{{ $scholarship->id_beasiswa }}">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 px-6 py-3 rounded-2xl font-black text-white shadow-lg">
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