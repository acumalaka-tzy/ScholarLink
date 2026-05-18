@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 py-12 px-4 md:px-10">

    <div class="max-w-5xl mx-auto">

        {{-- TOP CARD --}}
        <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-8 md:p-12 shadow-2xl">

            {{-- CATEGORY --}}
            <div class="mb-6">

                <span class="bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 px-4 py-2 rounded-full text-sm font-semibold">

                    🎓 {{ $scholarship->category->nama_kategori ?? 'No Category' }}

                </span>

            </div>

            {{-- TITLE --}}
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">

                {{ $scholarship->nama_beasiswa }}

            </h1>

            {{-- DESC --}}
            <p class="text-slate-300 text-lg leading-relaxed mb-10">

                {{ $scholarship->deskripsi }}

            </p>

            {{-- INFO GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

                <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">

                    <p class="text-slate-400 mb-2">
                        🏢 Provider
                    </p>

                    <h3 class="text-white text-xl font-bold">
                        {{ $scholarship->provider->nama_instansi ?? '-' }}
                    </h3>

                </div>

                <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">

                    <p class="text-slate-400 mb-2">
                        📅 Deadline
                    </p>

                    <h3 class="text-white text-xl font-bold">
                        {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}
                    </h3>

                </div>

            </div>


            {{-- REQUIREMENT --}}
            <div class="mb-10">

                <h2 class="text-2xl font-bold text-white mb-4">
                    📋 Persyaratan
                </h2>

                <div class="bg-slate-800/40 border border-slate-700 rounded-2xl p-6 text-slate-300 leading-relaxed">

                    {{ $scholarship->syarat }}

                </div>

            </div>


            {{-- BENEFIT --}}
            <div class="mb-10">

                <h2 class="text-2xl font-bold text-white mb-4">
                    🎁 Benefit
                </h2>

                <div class="bg-slate-800/40 border border-slate-700 rounded-2xl p-6 text-slate-300 leading-relaxed">

                    {{ $scholarship->benefit }}

                </div>

            </div>


            {{-- BUTTONS --}}
            <div class="flex flex-wrap gap-4">

                @auth

                    @if(auth()->user()->role == 'mahasiswa')

                        {{-- APPLY --}}
                        <form action="{{ route('applications.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="id_beasiswa"
                                   value="{{ $scholarship->id_beasiswa }}">

                            <button type="submit"
                                    class="bg-emerald-500 hover:bg-emerald-600 transition px-8 py-4 rounded-2xl text-white font-semibold shadow-lg">

                                🚀 Apply Now

                            </button>

                        </form>


                        {{-- FAVORITE --}}
                        <form action="{{ route('favorites.store', $scholarship->id_beasiswa) }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="bg-pink-500 hover:bg-pink-600 transition px-8 py-4 rounded-2xl text-white font-semibold shadow-lg">

                                ❤️ Favorite

                            </button>

                        </form>

                    @endif

                @endauth


                {{-- BACK --}}
                <a href="{{ route('scholarships.index') }}"
                   class="bg-slate-700 hover:bg-slate-600 transition px-8 py-4 rounded-2xl text-white font-semibold">

                    ← Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection