@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-6 pt-20 pb-14">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            <div>
                <div class="inline-block bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm mb-6 border border-blue-500/20">
                    Platform Beasiswa Mahasiswa Indonesia
                </div>
                <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6">
                    Temukan <span class="text-blue-400">Beasiswa</span> Impianmu 🚀
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed mb-8">
                    ScholarLink membantu mahasiswa menemukan informasi beasiswa terbaru dengan tampilan modern, cepat, dan mudah digunakan.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button class="bg-blue-500 hover:bg-blue-600 px-7 py-4 rounded-2xl font-bold text-lg transition shadow-2xl shadow-blue-500/40">
                        Jelajahi Beasiswa
                    </button>
                    <button class="border border-white/20 hover:border-blue-400 hover:text-blue-300 px-7 py-4 rounded-2xl font-bold text-lg transition">
                        Pelajari Lagi
                    </button>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-blue-500 blur-3xl opacity-20 rounded-full"></div>
                <div class="bg-white/10 border border-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl relative">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold">Statistik</h2>
                        <div class="bg-green-500/20 text-green-300 px-4 py-2 rounded-xl text-sm">Online</div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="bg-white/5 rounded-2xl p-6">
                            <h3 class="text-4xl font-black text-blue-400">120+</h3>
                            <p class="text-gray-300 mt-2">Beasiswa Aktif</p>
                        </div>
                        <div class="bg-white/5 rounded-2xl p-6">
                            <h3 class="text-4xl font-black text-purple-400">40+</h3>
                            <p class="text-gray-300 mt-2">Provider</p>
                        </div>
                        <div class="bg-white/5 rounded-2xl p-6">
                            <h3 class="text-4xl font-black text-pink-400">5K+</h3>
                            <p class="text-gray-300 mt-2">Pengguna</p>
                        </div>
                        <div class="bg-white/5 rounded-2xl p-6">
                            <h3 class="text-4xl font-black text-green-400">24/7</h3>
                            <p class="text-gray-300 mt-2">Update</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-4xl font-black mb-2">📚 Daftar Beasiswa</h2>
                <p class="text-gray-400">Temukan peluang terbaik untuk masa depanmu</p>
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($scholarships as $item)
            <div class="group relative overflow-hidden bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-7 hover:scale-105 transition duration-500 shadow-2xl">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-500 opacity-20 blur-3xl rounded-full"></div>
                <div class="relative">
                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <h3 class="text-2xl font-bold mb-2 group-hover:text-blue-400 transition">{{ $item->nama_beasiswa }}</h3>
                            <span class="bg-green-500/20 text-green-300 px-4 py-1 rounded-full text-sm">{{ $item->status }}</span>
                        </div>
                        <div class="text-4xl">🎓</div>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6">{{ $item->deskripsi }}</p>
                    <div class="space-y-4 mb-7">
                        <div class="flex items-center justify-between bg-white/5 rounded-2xl px-4 py-3">
                            <span class="text-gray-400">Tipe</span>
                            <span class="font-bold text-blue-300">{{ $item->tipe }}</span>
                        </div>
                        <div class="flex items-center justify-between bg-white/5 rounded-2xl px-4 py-3">
                            <span class="text-gray-400">Deadline</span>
                            <span class="font-bold text-red-300">{{ $item->deadline }}</span>
                        </div>
                    </div>
                    <a href="{{ route('kategori.detail', $item->id_beasiswa) }}" class="w-full block text-center bg-gradient-to-r from-blue-500 to-cyan-400 hover:from-blue-600 hover:to-cyan-500 py-4 rounded-2xl font-bold text-lg transition shadow-xl shadow-blue-500/30">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection