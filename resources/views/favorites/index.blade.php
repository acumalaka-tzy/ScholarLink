@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 py-10 px-4 md:px-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10">

        <div>
            <h1 class="text-4xl font-extrabold text-white flex items-center gap-3">
                ❤️ Favorite Beasiswa
            </h1>

            <p class="text-slate-400 mt-3 text-lg">
                Simpan beasiswa favoritmu dan akses lebih cepat
            </p>
        </div>

        <div class="bg-pink-500/10 border border-pink-500/20 px-6 py-4 rounded-2xl">
            <p class="text-pink-300 text-sm">
                Total Favorite
            </p>

            <h2 class="text-3xl font-bold text-white">
                {{ $favorites->count() }}
            </h2>
        </div>

    </div>


    {{-- EMPTY STATE --}}
    @if($favorites->count() == 0)

        <div class="bg-slate-900/70 border border-slate-800 rounded-3xl p-14 text-center">

            <div class="text-7xl mb-6">
                💔
            </div>

            <h2 class="text-3xl font-bold text-white mb-3">
                Belum Ada Favorite
            </h2>

            <p class="text-slate-400 text-lg mb-8">
                Tambahkan beasiswa favorit untuk memudahkan pencarian nanti
            </p>

            <a href="{{ route('scholarships.index') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-rose-500 hover:scale-105 transition px-8 py-4 rounded-2xl text-white font-semibold shadow-xl">

                🔍 Cari Beasiswa

            </a>

        </div>

    @else


    {{-- GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($favorites as $favorite)

            <div class="group relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/80 backdrop-blur-xl shadow-2xl hover:shadow-pink-500/10 hover:-translate-y-2 transition duration-500">

                {{-- TOP GLOW --}}
                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 via-transparent to-indigo-500/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>

                <div class="relative p-7">

                    {{-- CATEGORY --}}
                    <div class="mb-5">

                        <span class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 px-4 py-2 rounded-full text-sm font-semibold">

                            🎓
                            {{ $favorite->scholarship->category->nama_kategori ?? 'No Category' }}

                        </span>

                    </div>


                    {{-- TITLE --}}
                    <h2 class="text-2xl font-bold text-white leading-snug mb-4">

                        {{ $favorite->scholarship->nama_beasiswa }}

                    </h2>


                    {{-- DESCRIPTION --}}
                    <p class="text-slate-400 leading-relaxed mb-6 line-clamp-4">

                        {{ $favorite->scholarship->deskripsi }}

                    </p>


                    {{-- INFO --}}
                    <div class="space-y-3 mb-7">

                        <div class="flex items-center gap-3 text-slate-300">

                            <span class="text-lg">🏢</span>

                            <span>
                                {{ $favorite->scholarship->provider->nama_instansi ?? 'Unknown Provider' }}
                            </span>

                        </div>

                        <div class="flex items-center gap-3 text-slate-300">

                            <span class="text-lg">📅</span>

                            <span>
                                Deadline:
                                {{ \Carbon\Carbon::parse($favorite->scholarship->deadline)->format('d M Y') }}
                            </span>

                        </div>

                    </div>


                    {{-- BUTTONS --}}
                    <div class="flex gap-3">

                        {{-- DETAIL --}}
                        <a href="{{ route('scholarships.show', $favorite->scholarship->id_beasiswa) }}"
                           class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-500 hover:scale-105 transition text-white text-center py-3 rounded-2xl font-semibold shadow-lg">

                            Detail

                        </a>


                        {{-- REMOVE --}}
                        <form action="{{ route('favorites.destroy', $favorite->id_favorite) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Hapus dari favorite?')"
                                    class="bg-rose-500 hover:bg-rose-600 hover:scale-105 transition text-white px-5 py-3 rounded-2xl shadow-lg">

                                🗑️

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