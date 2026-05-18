@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-[#07132b] to-slate-950 px-4 sm:px-6 lg:px-10 py-10">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="mb-8 bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-5 py-4 rounded-2xl backdrop-blur-xl flex items-center justify-between">

            <span>
                {{ session('success') }}
            </span>

            <button onclick="this.parentElement.remove()" class="text-xl">
                ×
            </button>

        </div>

    @endif


    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-12">

        <div>

            <div class="inline-flex items-center gap-3 bg-pink-500/10 border border-pink-500/20 px-5 py-2 rounded-full mb-5">

                <span class="text-2xl">
                    ❤️
                </span>

                <span class="text-pink-300 font-medium">
                    Your Favorite Scholarships
                </span>

            </div>

            <h1 class="text-4xl md:text-5xl font-black text-white leading-tight">

                Favorite
                <span class="bg-gradient-to-r from-pink-400 via-rose-400 to-orange-300 bg-clip-text text-transparent">
                    Beasiswa
                </span>

            </h1>

            <p class="text-slate-400 mt-4 text-lg max-w-2xl leading-relaxed">

                Kumpulkan dan pantau beasiswa impianmu dalam satu tempat yang elegan dan modern.

            </p>

        </div>


        {{-- STATS --}}
        <div class="grid grid-cols-2 gap-4 w-full lg:w-auto">

            <div class="bg-white/5 border border-white/10 backdrop-blur-xl rounded-3xl px-6 py-5 min-w-[160px] shadow-2xl">

                <p class="text-slate-400 text-sm mb-2">
                    Total Favorite
                </p>

                <h2 class="text-3xl font-black text-white">
                    {{ $favorites->count() }}
                </h2>

            </div>

            <div class="bg-gradient-to-r from-pink-500/20 to-rose-500/20 border border-pink-500/20 backdrop-blur-xl rounded-3xl px-6 py-5 min-w-[160px] shadow-2xl">

                <p class="text-pink-200 text-sm mb-2">
                    Active Tracking
                </p>

                <h2 class="text-3xl font-black text-white">
                    🎯
                </h2>

            </div>

        </div>

    </div>



    {{-- EMPTY STATE --}}
    @if($favorites->count() == 0)

        <div class="relative overflow-hidden bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[40px] p-10 md:p-20 text-center shadow-2xl">

            <div class="absolute top-0 right-0 w-72 h-72 bg-pink-500/10 blur-3xl rounded-full"></div>

            <div class="relative z-10">

                <div class="text-8xl mb-8">
                    💔
                </div>

                <h2 class="text-4xl font-black text-white mb-4">
                    Belum Ada Favorite
                </h2>

                <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed mb-10">

                    Kamu belum menyimpan beasiswa favorit.
                    Temukan peluang terbaik dan simpan untuk masa depanmu.

                </p>

                <a href="{{ route('scholarships.index') }}"
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:scale-105 transition duration-300 px-8 py-4 rounded-2xl text-white font-bold shadow-2xl">

                    🚀 Jelajahi Beasiswa

                </a>

            </div>

        </div>

    @else

        {{-- GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-8">

            @foreach($favorites as $favorite)

                <div class="group relative overflow-hidden rounded-[32px] bg-white/5 border border-white/10 backdrop-blur-2xl p-7 shadow-2xl hover:-translate-y-2 hover:border-pink-500/30 transition duration-500">

                    {{-- Glow --}}
                    <div class="absolute -top-20 -right-20 w-52 h-52 bg-pink-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition duration-700"></div>

                    <div class="relative z-10">

                        {{-- TOP --}}
                        <div class="flex items-start justify-between mb-7">

                            <div class="w-16 h-16 rounded-3xl bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400 flex items-center justify-center text-3xl shadow-2xl">

                                🎓

                            </div>

                            <button class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-pink-400 hover:bg-pink-500 hover:text-white transition duration-300">

                                ❤

                            </button>

                        </div>


                        {{-- CATEGORY --}}
                        <div class="mb-4">

                            <span class="bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 px-4 py-2 rounded-full text-sm font-medium">

                                {{ $favorite->scholarship->category->nama_kategori ?? 'Scholarship' }}

                            </span>

                        </div>


                        {{-- TITLE --}}
                        <h2 class="text-2xl font-black text-white leading-snug mb-4 line-clamp-2">

                            {{ $favorite->scholarship->nama_beasiswa }}

                        </h2>


                        {{-- DESCRIPTION --}}
                        <p class="text-slate-400 leading-relaxed mb-7 line-clamp-3">

                            {{ $favorite->scholarship->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}

                        </p>


                        {{-- INFO --}}
                        <div class="space-y-4 mb-8">

                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center">
                                    🏢
                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Provider
                                    </p>

                                    <p class="text-white font-semibold">
                                        {{ $favorite->scholarship->provider->nama_instansi ?? '-' }}
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center">
                                    📅
                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Deadline
                                    </p>

                                    <p class="text-white font-semibold">
                                        {{ $favorite->scholarship->deadline ?? '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- BUTTONS --}}
                        <div class="flex flex-col sm:flex-row gap-3">

                            <a href="{{ route('scholarships.show', $favorite->scholarship->id_beasiswa) }}"
                               class="flex-1 text-center bg-gradient-to-r from-indigo-500 to-blue-500 hover:scale-[1.02] transition duration-300 py-3 rounded-2xl text-white font-bold shadow-xl">

                                Detail

                            </a>

                            <form action="{{ route('favorites.destroy', $favorite->id_favorite) }}"
                                  method="POST"
                                  class="sm:w-auto">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-full sm:w-auto bg-rose-500 hover:bg-rose-600 hover:scale-[1.02] transition duration-300 px-6 py-3 rounded-2xl text-white font-bold shadow-xl">

                                    Remove

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection