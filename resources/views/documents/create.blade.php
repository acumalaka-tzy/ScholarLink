@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[radial-gradient(circle_at_top,rgba(99,102,241,0.18),transparent_30%),radial-gradient(circle_at_bottom,rgba(168,85,247,0.15),transparent_30%)] bg-slate-950 py-12 px-4 sm:px-6 lg:px-10">

    <div class="max-w-5xl mx-auto">

        {{-- TOP --}}
        <div class="mb-12 text-center">

            <div class="inline-flex items-center gap-3 bg-slate-900/70 border border-slate-800 rounded-full px-5 py-2 mb-6 shadow-lg backdrop-blur-xl">

                <span class="text-xl">
                    📄
                </span>

                <span class="text-slate-300 text-sm font-medium tracking-wide">

                    ScholarLink Upload Center

                </span>

            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">

                Upload Your Document

            </h1>

            <p class="text-slate-400 text-lg mt-5 max-w-2xl mx-auto leading-relaxed">

                Upload dokumen persyaratan beasiswa dengan tampilan modern,
                aman, dan pengalaman upload yang lebih nyaman.

            </p>

        </div>


        {{-- CARD --}}
        <div class="relative overflow-hidden bg-slate-900/70 border border-slate-800 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl">

            {{-- GLOW --}}
            <div class="absolute top-0 left-0 w-80 h-80 bg-indigo-500/10 blur-3xl rounded-full"></div>

            <div class="absolute bottom-0 right-0 w-80 h-80 bg-pink-500/10 blur-3xl rounded-full"></div>


            <div class="relative grid grid-cols-1 lg:grid-cols-2">

                {{-- LEFT SIDE --}}
                <div class="hidden lg:flex flex-col justify-center p-12 border-r border-slate-800">

                    <div class="w-24 h-24 rounded-[2rem] bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-5xl shadow-2xl mb-8">

                        🚀

                    </div>

                    <h2 class="text-4xl font-black text-white leading-tight mb-6">

                        Secure
                        <br>
                        Document Upload

                    </h2>

                    <p class="text-slate-400 text-lg leading-relaxed mb-10">

                        Pastikan semua dokumen persyaratan beasiswa kamu
                        lengkap dan tersimpan dengan aman di ScholarLink.

                    </p>


                    {{-- FEATURES --}}
                    <div class="space-y-5">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-indigo-500/15 flex items-center justify-center text-2xl">

                                📁

                            </div>

                            <div>

                                <h3 class="text-white font-bold">
                                    Multi File Support
                                </h3>

                                <p class="text-slate-400 text-sm">
                                    PDF, DOCX, JPG, PNG
                                </p>

                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-purple-500/15 flex items-center justify-center text-2xl">

                                🔒

                            </div>

                            <div>

                                <h3 class="text-white font-bold">
                                    Safe Storage
                                </h3>

                                <p class="text-slate-400 text-sm">
                                    Dokumen tersimpan aman
                                </p>

                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-pink-500/15 flex items-center justify-center text-2xl">

                                ⚡

                            </div>

                            <div>

                                <h3 class="text-white font-bold">
                                    Fast Process
                                </h3>

                                <p class="text-slate-400 text-sm">
                                    Upload cepat & responsif
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- RIGHT SIDE FORM --}}
                <div class="p-6 sm:p-10 lg:p-12">

                    {{-- SUCCESS --}}
                    @if(session('success'))

                        <div class="mb-8 bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 px-5 py-4 rounded-2xl backdrop-blur-xl">

                            {{ session('success') }}

                        </div>

                    @endif


                    <form action="{{ route('documents.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="space-y-8">

                        @csrf


                        {{-- APPLICATION --}}
                        <div>

                            <label class="block text-white font-semibold mb-3 text-lg">

                                🎓 Scholarship Application

                            </label>

                            <select
                                name="id_application"
                                class="w-full bg-slate-800/80 border border-slate-700 text-white rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">

                                @foreach($applications as $application)

                                    <option value="{{ $application->id_application }}">

                                        {{ $application->scholarship->nama_beasiswa }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- DOCUMENT TYPE --}}
                        <div>

                            <label class="block text-white font-semibold mb-3 text-lg">

                                📝 Document Type

                            </label>

                            <input
                                type="text"
                                name="jenis_dokumen"
                                placeholder="Contoh: CV, Transkrip, Sertifikat"
                                class="w-full bg-slate-800/80 border border-slate-700 text-white placeholder-slate-400 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">

                            @error('jenis_dokumen')

                                <p class="text-red-400 mt-2 text-sm">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- FILE UPLOAD --}}
                        <div>

                            <label class="block text-white font-semibold mb-3 text-lg">

                                📁 Upload File

                            </label>

                            <div class="relative border-2 border-dashed border-slate-700 hover:border-indigo-500 transition duration-300 rounded-[2rem] bg-slate-800/40 p-10 text-center group">

                                <div class="flex flex-col items-center">

                                    <div class="w-24 h-24 rounded-full bg-gradient-to-r from-indigo-500/20 to-purple-500/20 flex items-center justify-center text-5xl mb-6 group-hover:scale-110 transition duration-300">

                                        ☁️

                                    </div>

                                    <h3 class="text-2xl font-bold text-white mb-3">

                                        Drag & Drop File

                                    </h3>

                                    <p class="text-slate-400 mb-6">

                                        atau klik tombol di bawah untuk memilih file

                                    </p>

                                    <input
                                        type="file"
                                        name="file"
                                        class="block w-full text-slate-300
                                        file:mr-4
                                        file:py-3
                                        file:px-6
                                        file:rounded-2xl
                                        file:border-0
                                        file:bg-gradient-to-r
                                        file:from-indigo-500
                                        file:to-purple-600
                                        file:text-white
                                        file:font-semibold
                                        hover:file:opacity-90">

                                    <p class="text-slate-500 text-sm mt-5">

                                        Supported: PDF, DOCX, JPG, PNG

                                    </p>

                                </div>

                            </div>

                            @error('file')

                                <p class="text-red-400 mt-2 text-sm">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- BUTTON --}}
                        <div class="pt-4">

                            <button
                                type="submit"
                                class="group relative overflow-hidden w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:scale-[1.02] transition duration-300 text-white py-5 rounded-2xl text-lg font-black shadow-[0_15px_50px_rgba(99,102,241,0.4)]">

                                <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>

                                <span class="relative flex items-center justify-center gap-3">

                                    🚀 Upload Document

                                </span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection