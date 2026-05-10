@extends('layouts.app')

@section('content')
{{-- Container utama dengan z-0 agar tidak balapan dengan navbar --}}
<div class="max-w-7xl mx-auto px-6 py-10 relative z-0">
    
    {{-- Tombol Kembali --}}
    <div class="mb-8">
        <a href="{{ route('kategori.index') }}" class="text-blue-400 hover:text-blue-300 font-medium flex items-center gap-2 transition group">
            <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Katalog
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        {{-- Sisi Kiri: Informasi Utama --}}
        <div class="lg:col-span-2 space-y-8">
            
            {{-- Header Card --}}
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500 opacity-10 blur-3xl rounded-full"></div>
                
                <div class="relative flex items-center gap-6">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-2xl flex items-center justify-center text-3xl border border-blue-500/20">🏛️</div>
                    <div>
                        <h1 class="text-3xl font-black text-white leading-tight">{{ $scholarship->nama_beasiswa }}</h1>
                        <p class="text-blue-300 font-semibold mt-1">{{ $scholarship->tipe }}</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mt-8">
                    <span class="px-4 py-1.5 bg-green-500/20 text-green-300 rounded-xl text-xs font-bold uppercase border border-green-500/20">
                        STATUS: {{ $scholarship->status }}
                    </span>
                    <span class="px-4 py-1.5 bg-white/5 rounded-xl text-xs font-semibold text-gray-400 border border-white/5">
                        Dipublikasikan: {{ \Carbon\Carbon::parse($scholarship->tanggal_dibuat)->format('d M Y') }}
                    </span>
                </div>
            </div>

            {{-- Konten Detail --}}
            <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl space-y-10">
                
                {{-- Deskripsi --}}
                <section>
                    <h3 class="text-xl font-bold mb-4 text-blue-400 flex items-center gap-3">
                        <span class="w-1 h-6 bg-blue-500 rounded-full"></span>
                        Deskripsi Beasiswa
                    </h3>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        {{ $scholarship->deskripsi }}
                    </p>
                </section>

                {{-- Persyaratan --}}
                <section>
                    <h3 class="text-xl font-bold mb-4 text-blue-400 flex items-center gap-3">
                        <span class="w-1 h-6 bg-blue-500 rounded-full"></span>
                        Persyaratan Utama
                    </h3>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/5 shadow-inner">
                        <p class="text-gray-300 leading-relaxed italic">
                            "{{ $scholarship->syarat }}"
                        </p>
                    </div>
                </section>

                {{-- Benefit --}}
                <section>
                    <h3 class="text-xl font-bold mb-4 text-blue-400 flex items-center gap-3">
                        <span class="w-1 h-6 bg-blue-500 rounded-full"></span>
                        Benefit & Cakupan
                    </h3>
                    <div class="text-gray-300 leading-relaxed bg-blue-500/5 p-6 rounded-2xl border border-blue-500/10">
                        {{ $scholarship->benefit }}
                    </div>
                </section>
            </div>
        </div>

        {{-- Sisi Kanan: Sidebar Sticky --}}
        <aside class="space-y-6">
            {{-- Bagian ini yang sering menimpa navbar, kita kunci dengan z-10 --}}
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl>
                <h4 class="font-bold text-white mb-8 text-center text-xl tracking-tight">Informasi Pendaftaran</h4>
                
                <div class="space-y-4 mb-10">
                    <div class="flex justify-between items-center bg-white/5 p-4 rounded-2xl border border-white/5">
                        <span class="text-gray-400 text-sm">Batas Akhir</span>
                        <span class="font-bold text-red-400">
                            {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center bg-white/5 p-4 rounded-2xl border border-white/5">
                        <span class="text-gray-400 text-sm">Dibuat</span>
                        <span class="font-bold text-gray-300 text-sm">
                            {{ \Carbon\Carbon::parse($scholarship->tanggal_dibuat)->format('d M Y') }}
                        </span>
                    </div>
                </div>

                <button class="w-full py-4 bg-blue-500 hover:bg-blue-600 text-white rounded-2xl font-black text-lg transition-all duration-300 shadow-xl shadow-blue-500/40 transform hover:-translate-y-1 active:scale-95 uppercase tracking-wider">
                    Daftar Sekarang
                </button>
                
                <p class="text-center text-[10px] text-gray-500 mt-5 leading-relaxed px-2">
                    *Pastikan kualifikasi Anda sesuai dengan syarat di atas sebelum melakukan pendaftaran.
                </p>
            </div>
            
            {{-- Info Penyelenggara --}}
            <div class="bg-white/5 rounded-3xl p-6 border border-white/5">
                <h4 class="font-bold text-sm mb-3 text-white flex items-center gap-2">
                    <span>🏢</span> Tentang Penyelenggara
                </h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Provider ID: <span class="text-blue-400 font-mono">#{{ $scholarship->id_provider }}</span>. Informasi lebih lanjut mengenai instansi dapat dilihat melalui profil provider.
                </p>
            </div>
        </aside>

    </div>
</div>
@endsection