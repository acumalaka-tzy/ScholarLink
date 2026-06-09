@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-6xl mx-auto">
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('documents.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Documents
            </a>
        </div>

        <div class="mb-8 sm:mb-12 text-center">
            <div class="inline-flex items-center gap-2 sm:gap-3 bg-white border border-gray-200 rounded-full px-4 sm:px-5 py-2 sm:py-3 mb-4 sm:mb-6 shadow-lg">
                <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xs sm:text-sm">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                </div>
                <span class="text-gray-700 text-xs sm:text-sm font-black tracking-wide">
                    ScholarLink Upload Center
                </span>
            </div>
            <h1 class="text-2xl sm:text-5xl md:text-6xl font-black text-gray-900 tracking-tight leading-tight">
                Upload Your
                <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                    Document
                </span>
            </h1>
            <p class="text-gray-500 text-xs sm:text-lg mt-3 sm:mt-6 max-w-3xl mx-auto leading-relaxed font-bold px-2">
                Upload dokumen persyaratan beasiswa dengan tampilan modern, aman, cepat, dan pengalaman upload yang lebih profesional.
            </p>
        </div>

        <div class="relative overflow-hidden bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
            <div class="absolute top-0 left-0 w-48 sm:w-80 h-48 sm:h-80 bg-cyan-100 blur-3xl rounded-full opacity-50"></div>
            <div class="absolute bottom-0 right-0 w-48 sm:w-80 h-48 sm:h-80 bg-orange-100 blur-3xl rounded-full opacity-50"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2">
                <div class="hidden lg:flex flex-col justify-center p-8 sm:p-14 border-r border-gray-100">
                    <div class="w-20 sm:w-28 h-20 sm:h-28 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white text-4xl sm:text-6xl shadow-2xl shadow-blue-500/20 mb-6 sm:mb-10">
                        <i class="bi bi-folder-fill"></i>
                    </div>
                    <h2 class="text-3xl sm:text-5xl font-black text-gray-900 leading-tight mb-4 sm:mb-6">
                        Secure <br> Upload Center
                    </h2>
                    <p class="text-gray-500 text-xs sm:text-lg leading-relaxed mb-8 sm:mb-12 font-bold">
                        Pastikan semua dokumen persyaratan beasiswa kamu lengkap dan tersimpan aman di platform ScholarLink.
                    </p>

                    <div class="space-y-4 sm:space-y-6">
                        <div class="flex items-center gap-3 sm:gap-5">
                            <div class="w-10 sm:w-14 h-10 sm:h-14 rounded-lg sm:rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                                <i class="bi bi-file-earmark-richtext-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black">Multi File Support</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">PDF, DOCX, JPG, PNG</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black">Safe Storage</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">Dokumen tersimpan aman</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-lightning-charge-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-black">Fast Process</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">Upload cepat & responsif</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-10 lg:p-14">
                    @if(session('success'))
                        <div class="mb-8 bg-green-50 border border-green-200 rounded-3xl p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="font-black text-green-700">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div>
                            <label class="block text-gray-700 font-black mb-3 text-lg">
                                Scholarship Application
                            </label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <select name="id_application" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                                    @foreach($applications as $application)
                                        <option value="{{ $application->id_application }}">
                                            {{ $application->scholarship->nama_beasiswa }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-black mb-3 text-lg">
                                Document Type
                            </label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <i class="bi bi-file-earmark-text-fill"></i>
                                </div>
                                <input type="text" name="jenis_dokumen" placeholder="Contoh: CV, Transkrip, Sertifikat" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                            </div>
                            @error('jenis_dokumen')
                                <p class="text-red-500 font-bold mt-3 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-black mb-3 text-lg">
                                Upload File
                            </label>
                            <div class="relative border-2 border-dashed border-gray-300 hover:border-cyan-500 transition duration-300 rounded-[2rem] bg-gray-50 p-10 text-center group">
                                <div class="flex flex-col items-center">
                                    <div class="w-28 h-28 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 text-blue-600 flex items-center justify-center text-6xl mb-8 group-hover:scale-110 transition duration-300 shadow-lg">
                                        <i class="bi bi-cloud-arrow-up-fill"></i>
                                    </div>
                                    <h3 class="text-3xl font-black text-gray-900 mb-4">
                                        Drag & Drop File
                                    </h3>
                                    <p class="text-gray-500 font-bold mb-8">
                                        atau klik tombol di bawah untuk memilih file
                                    </p>
                                    <input type="file" name="file" class="block w-full text-gray-600 font-bold file:mr-4 file:py-4 file:px-7 file:rounded-2xl file:border-0 file:bg-gradient-to-r file:from-blue-600 file:to-cyan-500 file:text-white file:font-black hover:file:opacity-90 file:shadow-lg file:shadow-blue-500/20">
                                    <p class="text-gray-400 text-sm mt-6 font-bold">
                                        Supported: PDF, DOCX, JPG, PNG
                                    </p>
                                </div>
                            </div>
                            @error('file')
                                <p class="text-red-500 font-bold mt-3 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="group relative overflow-hidden w-full bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 hover:scale-[1.02] transition duration-300 text-white py-5 rounded-2xl text-lg font-black shadow-[0_15px_50px_rgba(59,130,246,0.3)]">
                                <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                                <span class="relative flex items-center justify-center gap-3">
                                    <i class="bi bi-send-fill"></i>
                                    Upload Document
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
