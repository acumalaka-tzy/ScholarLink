@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[radial-gradient(circle_at_top,rgba(99,102,241,0.15),transparent_35%),radial-gradient(circle_at_bottom,rgba(168,85,247,0.12),transparent_35%)] bg-slate-950 px-4 sm:px-6 lg:px-10 py-10">

    <div class="max-w-7xl mx-auto">

        {{-- TOP HEADER --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">

            <div>

                <div class="inline-flex items-center gap-3 bg-slate-900/70 border border-slate-800 rounded-full px-5 py-2 mb-5 shadow-lg backdrop-blur-xl">

                    <span class="text-xl">
                        📄
                    </span>

                    <span class="text-slate-300 text-sm font-medium tracking-wide">

                        ScholarLink Document Center

                    </span>

                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight tracking-tight">

                    My Documents

                </h1>

                <p class="text-slate-400 mt-4 text-base sm:text-lg max-w-2xl leading-relaxed">

                    Upload, manage, dan akses semua dokumen beasiswa kamu
                    dengan tampilan modern dan pengalaman yang lebih nyaman.

                </p>

            </div>


            {{-- BUTTON --}}
            <div class="flex flex-wrap gap-4">

                <a href="{{ route('documents.create') }}"
                   class="group relative overflow-hidden inline-flex items-center justify-center gap-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-7 py-4 rounded-2xl font-bold text-white shadow-[0_10px_40px_rgba(99,102,241,0.4)] hover:scale-105 transition duration-300">

                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>

                    <span class="relative text-xl">
                        🚀
                    </span>

                    <span class="relative">
                        Upload Document
                    </span>

                </a>

            </div>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-8 bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-6 py-5 rounded-3xl backdrop-blur-xl shadow-lg flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-2xl">

                    ✅

                </div>

                <div>

                    <p class="font-bold text-lg">
                        Success
                    </p>

                    <p class="text-sm text-emerald-200">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- DOCUMENTS --}}
        @if($documents->count() > 0)

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

                @foreach($documents as $document)

                    <div class="group relative bg-slate-900/70 backdrop-blur-2xl border border-slate-800 rounded-[2rem] overflow-hidden shadow-2xl hover:border-indigo-500/30 hover:-translate-y-1 transition duration-300">

                        {{-- GLOW --}}
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 bg-gradient-to-br from-indigo-500/10 via-transparent to-pink-500/10"></div>

                        <div class="relative p-7">

                            {{-- TOP --}}
                            <div class="flex items-start justify-between gap-4 mb-6">

                                <div class="flex items-center gap-4">

                                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-3xl shadow-lg">

                                        📁

                                    </div>

                                    <div>

                                        <span class="inline-block bg-indigo-500/15 text-indigo-300 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-3">

                                            {{ $document->jenis_dokumen }}

                                        </span>

                                        <h2 class="text-xl font-bold text-white break-all">

                                            {{ $document->nama_file }}

                                        </h2>

                                    </div>

                                </div>

                            </div>


                            {{-- INFO --}}
                            <div class="space-y-4 mb-7">

                                <div class="flex items-center justify-between bg-slate-800/60 rounded-2xl px-5 py-4">

                                    <span class="text-slate-400 font-medium">

                                        Upload Date

                                    </span>

                                    <span class="text-white font-semibold">

                                        {{ $document->created_at->format('d M Y') }}

                                    </span>

                                </div>

                            </div>


                            {{-- BUTTONS --}}
                            <div class="flex flex-col sm:flex-row gap-4">

                                <a href="{{ asset('storage/' . $document->file_path) }}"
                                   target="_blank"
                                   class="flex-1 inline-flex justify-center items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-5 py-4 rounded-2xl font-semibold transition duration-300 shadow-lg">

                                    👁️ View

                                </a>


                                <form action="{{ route('documents.destroy', $document->id_dokumen) }}"
                                      method="POST"
                                      class="flex-1">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Hapus dokumen ini?')"
                                            class="w-full inline-flex justify-center items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-5 py-4 rounded-2xl font-semibold transition duration-300 shadow-lg">

                                        🗑️ Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="relative overflow-hidden bg-slate-900/70 border border-slate-800 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl">

                {{-- DECOR --}}
                <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl"></div>

                <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-500/10 rounded-full blur-3xl"></div>

                <div class="relative py-24 px-8 flex flex-col items-center text-center">

                    <div class="w-36 h-36 rounded-full bg-gradient-to-r from-indigo-500/20 to-purple-500/20 border border-slate-700 flex items-center justify-center text-7xl shadow-2xl mb-8 animate-pulse">

                        📂

                    </div>

                    <h2 class="text-4xl font-black text-white mb-4">

                        No Documents Uploaded

                    </h2>

                    <p class="text-slate-400 text-lg max-w-2xl leading-relaxed mb-10">

                        Kamu belum memiliki dokumen.
                        Upload file sekarang agar proses pendaftaran beasiswa
                        menjadi lebih cepat dan mudah.

                    </p>

                    <a href="{{ route('documents.create') }}"
                       class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-8 py-5 rounded-2xl font-bold text-white text-lg shadow-[0_15px_50px_rgba(99,102,241,0.4)] hover:scale-105 transition duration-300">

                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>

                        <span class="relative text-2xl">
                            🚀
                        </span>

                        <span class="relative">
                            Upload First Document
                        </span>

                    </a>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection