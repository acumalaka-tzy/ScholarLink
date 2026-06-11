@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] px-3 sm:px-6 lg:px-10 py-6 sm:py-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 sm:gap-6 mb-8 sm:mb-12">
            <div>
                <div class="inline-flex items-center gap-2 sm:gap-3 bg-white border border-gray-200 rounded-full px-3 sm:px-5 py-2 sm:py-3 mb-3 sm:mb-6 shadow-lg">
                    <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xs sm:text-sm">
                        <i class="bi bi-folder-fill"></i>
                    </div>
                    <span class="text-gray-700 text-xs sm:text-sm font-black tracking-wide">
                        ScholarLink Document Center
                    </span>
                </div>
                <h1 class="text-2xl sm:text-5xl md:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                    My
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Documents
                    </span>
                </h1>
                <p class="text-gray-500 mt-2 sm:mt-5 text-xs sm:text-lg max-w-3xl leading-relaxed font-bold">
                    Upload, manage, dan akses semua dokumen beasiswa kamu dengan tampilan modern dan pengalaman yang lebih nyaman.
                </p>
            </div>

            <div class="flex flex-wrap gap-2 sm:gap-4">
                <a href="{{ route('documents.create') }}" class="group relative overflow-hidden inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98] text-xs sm:text-base">
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                    <span class="relative text-base sm:text-xl">
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                    </span>
                    <span class="relative hidden xs:inline">
                        Upload Document
                    </span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 sm:mb-8 bg-green-50 border border-green-200 rounded-lg sm:rounded-3xl p-4 sm:p-6 shadow-lg">
                <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                    <div class="w-10 sm:w-14 h-10 sm:h-14 rounded-lg sm:rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-lg sm:text-2xl flex-shrink-0">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <p class="font-black text-green-700 text-lg">Success</p>
                        <p class="text-green-600 font-bold text-sm mt-1">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if($documents->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($documents as $document)
                    <div class="group relative bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-[0_20px_60px_rgba(15,23,42,0.08)] hover:shadow-[0_25px_70px_rgba(59,130,246,0.15)] hover:-translate-y-1 transition duration-300">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                        
                        <div class="relative p-8">
                            <div class="flex items-start justify-between gap-4 mb-8">
                                <div class="flex items-center gap-5">
                                    <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white text-4xl shadow-xl shadow-blue-500/20">
                                        <i class="bi bi-file-earmark-richtext-fill"></i>
                                    </div>
                                    <div>
                                        <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-black uppercase tracking-wider mb-4 border border-blue-200">
                                            <i class="bi bi-tag-fill"></i>
                                            {{ $document->jenis_dokumen }}
                                        </span>
                                        <h2 class="text-2xl font-black text-gray-900 break-all leading-snug">
                                            {{ $document->nama_file }}
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-5 mb-8">
                                <div class="flex items-center justify-between bg-gray-50 rounded-2xl px-5 py-4 border border-gray-100">
                                    <div class="flex items-center gap-3 text-gray-500 font-bold">
                                        <div class="w-10 h-10 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                                            <i class="bi bi-calendar-event-fill"></i>
                                        </div>
                                        Upload Date
                                    </div>
                                    <span class="text-gray-900 font-black">
                                        {{ $document->created_at->format('d M Y H:i:s') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="flex-1 inline-flex justify-center items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-5 py-4 rounded-2xl font-black transition duration-300 shadow-lg shadow-blue-500/20">
                                    <i class="bi bi-eye-fill"></i>
                                    View
                                </a>

                                <form action="{{ route('documents.destroy', $document->id_dokumen) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus dokumen ini?')" class="w-full inline-flex justify-center items-center gap-3 bg-red-100 hover:bg-red-200 text-red-700 px-5 py-4 rounded-2xl font-black transition duration-300 border border-red-200">
                                        <i class="bi bi-trash-fill"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
                <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 right-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-50"></div>
                
                <div class="relative py-24 px-8 flex flex-col items-center text-center">
                    <div class="w-40 h-40 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 border border-gray-200 flex items-center justify-center text-blue-600 text-7xl shadow-2xl shadow-blue-500/10 mb-10">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <h2 class="text-5xl font-black text-gray-900 mb-5">
                        No Documents Uploaded
                    </h2>
                    <p class="text-gray-500 text-lg max-w-3xl leading-relaxed mb-12 font-bold">
                        Kamu belum memiliki dokumen. Upload file sekarang agar proses pendaftaran beasiswa menjadi lebih cepat dan mudah.
                    </p>
                    <a href="{{ route('documents.create') }}" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98] hover:scale-[1.03] transition duration-300">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative text-2xl">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
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
