@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-10 px-4 md:px-10 overflow-hidden">
    {{-- Background Decorations --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-0">
        <div class="relative bg-white border border-gray-100 rounded-[2.5rem] shadow-xl p-8 md:p-12">
            {{-- Header/Badges --}}
            <div class="flex flex-wrap items-center gap-4 mb-8">
                <span class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 px-5 py-3 rounded-full text-sm font-black shadow-sm">
                    <i class="bi bi-mortarboard-fill"></i> {{ $scholarship->category->nama_kategori ?? 'Umum' }}
                </span>
                <span class="inline-flex items-center gap-2 bg-green-50 border border-green-100 text-green-700 px-5 py-3 rounded-full text-sm font-black shadow-sm">
                    <i class="bi bi-check-circle-fill"></i> ACTIVE
                </span>
            </div>

            {{-- Title Section --}}
            <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-10 mb-12">
                <div class="max-w-4xl">
                    <h1 class="text-4xl md:text-6xl font-black text-gray-900 leading-tight mb-6">{{ $scholarship->nama_beasiswa }}</h1>
                    <p class="text-gray-500 text-lg leading-relaxed font-bold">{{ $scholarship->deskripsi }}</p>
                </div>
                <div class="w-24 h-24 md:w-28 md:h-28 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-5xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                    <i class="bi bi-award-fill"></i>
                </div>
            </div>

            {{-- Info Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-7 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-blue-100 text-blue-600 flex items-center justify-center text-3xl">
                        <i class="bi bi-building-fill"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 font-black text-xs uppercase tracking-widest mb-1">Provider</p>
                        <h3 class="text-xl font-black text-gray-900">{{ $scholarship->provider->nama_instansi ?? '-' }}</h3>
                    </div>
                </div>
                <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-7 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-[1.5rem] bg-red-100 text-red-500 flex items-center justify-center text-3xl">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 font-black text-xs uppercase tracking-widest mb-1">Deadline</p>
                        <h3 class="text-xl font-black text-gray-900">{{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}</h3>
                    </div>
                </div>
            </div>

            {{-- Requirements & Benefits --}}
            <div class="grid xl:grid-cols-2 gap-8 mb-12">
                @foreach(['Persyaratan' => ['bi-card-checklist', 'orange', $scholarship->syarat], 'Benefit' => ['bi-gift-fill', 'pink', $scholarship->benefit]] as $title => $data)
                <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-{{$data[1]}}-100 text-{{$data[1]}}-500 flex items-center justify-center text-2xl shadow-sm">
                            <i class="bi {{ $data[0] }}"></i>
                        </div>
                        <h2 class="text-2xl font-black text-gray-900">{{ $title }}</h2>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 text-gray-600 font-medium leading-relaxed whitespace-pre-line shadow-inner">
                        {{ $data[2] }}
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap gap-4">
                @auth
                    @if(auth()->user()->role == 'mahasiswa')
                        <form action="{{ route('applications.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_beasiswa" value="{{ $scholarship->id_beasiswa }}">
                            <button type="submit" class="flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-[1.02] transition px-8 py-4 rounded-2xl font-black text-white shadow-lg shadow-green-500/20">
                                <i class="bi bi-send-fill"></i> Apply Now
                            </button>
                        </form>
                        <form action="{{ route('favorites.store', $scholarship->id_beasiswa) }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 bg-pink-500 hover:bg-pink-600 transition px-8 py-4 rounded-2xl font-black text-white shadow-lg shadow-pink-500/20">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </button>
                        </form>
                    @endif
                @endauth
                <a href="{{ route('scholarships.index') }}" class="flex items-center gap-3 bg-gray-100 hover:bg-gray-200 transition px-8 py-4 rounded-2xl font-black text-gray-700 border border-gray-200">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
