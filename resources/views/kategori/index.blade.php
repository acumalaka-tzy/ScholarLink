@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h2 class="text-4xl font-black mb-2">📚 Katalog Kategori</h2>
            <p class="text-gray-400">Pilih beasiswa yang sesuai dengan kualifikasimu</p>
        </div>
        
        {{-- Tombol Search dikembalikan --}}
        <div class="relative group">
            <input type="text" placeholder="Cari beasiswa..." class="bg-white/5 border border-white/10 rounded-2xl px-6 py-4 w-full md:w-80 focus:outline-none focus:border-blue-500 transition backdrop-blur-md">
            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-400 hover:text-blue-300">
                🔍
            </button>
        </div>
    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
        @foreach($scholarships as $item)
        <div class="group relative overflow-hidden bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-7 hover:scale-105 transition duration-500 shadow-2xl">
            <div class="relative">
                <div class="flex items-start justify-between mb-5">
                    <div>
                        <h3 class="text-2xl font-bold mb-2 group-hover:text-blue-400 transition">{{ $item->nama_beasiswa }}</h3>
                        <span class="bg-green-500/20 text-green-300 px-4 py-1 rounded-full text-sm font-bold">{{ $item->status }}</span>
                    </div>
                    <div class="text-4xl">🎓</div>
                </div>
                <p class="text-gray-300 mb-6 line-clamp-2">{{ $item->deskripsi }}</p>
                <div class="space-y-4 mb-7 text-sm">
                    <div class="flex justify-between bg-white/5 p-3 rounded-xl">
                        <span class="text-gray-400">Tipe</span>
                        <span class="text-blue-300 font-bold">{{ $item->tipe }}</span>
                    </div>
                    <div class="flex justify-between bg-white/5 p-3 rounded-xl">
                        <span class="text-gray-400">Deadline</span>
                        <span class="text-red-400 font-bold">{{ $item->deadline }}</span>
                    </div>
                </div>
                <a href="{{ route('kategori.detail', $item->id_beasiswa) }}" class="block w-full text-center bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 py-4 rounded-2xl font-bold text-lg transition shadow-xl shadow-blue-500/30">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection