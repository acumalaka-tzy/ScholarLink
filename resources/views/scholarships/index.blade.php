@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 px-4 md:px-10 py-10">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-12">

        <div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-white flex items-center gap-4">

                🎓 Daftar Beasiswa

            </h1>

            <p class="text-slate-400 text-lg mt-3 max-w-2xl">
                Temukan peluang beasiswa terbaik untuk masa depan dan karier impianmu
            </p>

        </div>


        {{-- BUTTON PROVIDER --}}
        @auth
            @if(auth()->user()->role == 'provider')

                <a href="{{ route('provider.scholarships.create') }}"
                   class="group bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:scale-105 transition duration-300 px-7 py-4 rounded-2xl text-white font-semibold shadow-2xl flex items-center gap-3 w-fit">

                    <span class="text-xl group-hover:rotate-90 transition duration-300">
                        ✨
                    </span>

                    Tambah Beasiswa

                </a>

            @endif
        @endauth

    </div>



    {{-- EMPTY STATE --}}
    @if($scholarships->count() == 0)

        <div class="bg-slate-900/70 border border-slate-800 rounded-3xl p-16 text-center">

            <div class="text-7xl mb-6">
                😕
            </div>

            <h2 class="text-3xl font-bold text-white mb-4">
                Belum Ada Beasiswa
            </h2>

            <p class="text-slate-400 text-lg">
                Data scholarship belum tersedia saat ini
            </p>

        </div>

    @else


    {{-- GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($scholarships as $item)

            <div class="group relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/80 backdrop-blur-xl shadow-2xl hover:-translate-y-3 hover:shadow-indigo-500/10 transition duration-500">

                {{-- GLOW EFFECT --}}
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 via-transparent to-pink-500/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>

                <div class="relative p-7">


                    {{-- CATEGORY --}}
                    <div class="flex items-center justify-between mb-5">

                        <span class="bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 px-4 py-2 rounded-full text-sm font-semibold">

                            {{ $item->category->nama_kategori ?? 'No Category' }}

                        </span>


                        {{-- STATUS --}}
                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-3 py-1 rounded-full text-xs font-bold">

                            ACTIVE

                        </span>

                    </div>


                    {{-- TITLE --}}
                    <h2 class="text-2xl font-bold text-white leading-snug mb-4 group-hover:text-indigo-300 transition">

                        {{ $item->nama_beasiswa }}

                    </h2>


                    {{-- DESCRIPTION --}}
                    <p class="text-slate-400 leading-relaxed mb-7 line-clamp-4">

                        {{ $item->deskripsi }}

                    </p>


                    {{-- INFO --}}
                    <div class="space-y-4 mb-8">

                        <div class="flex items-center gap-3 text-slate-300">

                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center">
                                🏢
                            </div>

                            <div>

                                <p class="text-xs text-slate-500">
                                    Provider
                                </p>

                                <p class="font-medium">
                                    {{ $item->provider->nama_instansi ?? '-' }}
                                </p>

                            </div>

                        </div>


                        <div class="flex items-center gap-3 text-slate-300">

                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center">
                                📅
                            </div>

                            <div>

                                <p class="text-xs text-slate-500">
                                    Deadline
                                </p>

                                <p class="font-medium">
                                    {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
                                </p>

                            </div>

                        </div>

                    </div>



                    {{-- BUTTONS --}}
                    <div class="flex flex-wrap gap-3">

                        {{-- DETAIL --}}
                        <a href="{{ route('scholarships.show', $item->id_beasiswa) }}"
                           class="flex-1 bg-slate-800 hover:bg-slate-700 transition text-white text-center py-3 rounded-2xl font-semibold">

                            Detail

                        </a>


                        @auth

                            @if(auth()->user()->role == 'mahasiswa')

                                {{-- APPLY --}}
                                <form action="{{ route('applications.store') }}"
                                      method="POST">

                                    @csrf

                                    <input type="hidden"
                                           name="id_beasiswa"
                                           value="{{ $item->id_beasiswa }}">

                                    <button type="submit"
                                            class="bg-emerald-500 hover:bg-emerald-600 transition text-white px-5 py-3 rounded-2xl font-semibold shadow-lg">

                                        Apply

                                    </button>

                                </form>


                                {{-- FAVORITE --}}
                                <form action="{{ route('favorites.store', $item->id_beasiswa) }}"
                                      method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="bg-pink-500 hover:bg-pink-600 transition text-white px-5 py-3 rounded-2xl font-semibold shadow-lg">

                                        ❤️

                                    </button>

                                </form>

                            @endif

                        @endauth

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    @endif

</div>

@endsection