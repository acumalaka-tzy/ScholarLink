@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-8 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-5xl mx-auto">
        {{-- Back Button --}}
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('applications.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Applications
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                {{-- Application Header --}}
                <div class="bg-white border border-gray-100 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8 shadow-2xl">
                    <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400 -mx-6 sm:-mx-8 mb-6 sm:mb-8"></div>

                    <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6 mb-8">
                        <div class="w-16 sm:w-20 h-16 sm:h-20 rounded-2xl sm:rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl sm:text-4xl shadow-lg shadow-blue-500/20 flex-shrink-0">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-2xl sm:text-4xl font-black text-gray-900 mb-2">{{ $application->scholarship->nama_beasiswa }}</h1>
                            <p class="text-gray-500 text-sm sm:text-base font-bold mb-3">{{ $application->scholarship->deskripsi }}</p>
                            <div class="flex flex-wrap gap-2 sm:gap-3">
                                @if($application->status == 'pending')
                                    <span class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-3 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200 text-xs sm:text-sm font-black">
                                        <i class="bi bi-hourglass-split"></i> Pending
                                    </span>
                                @elseif($application->status == 'approved')
                                    <span class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-3 rounded-full bg-green-100 text-green-700 border border-green-200 text-xs sm:text-sm font-black">
                                        <i class="bi bi-check-circle-fill"></i> Approved
                                    </span>
                                @elseif($application->status == 'rejected')
                                    <span class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-3 rounded-full bg-red-100 text-red-700 border border-red-200 text-xs sm:text-sm font-black">
                                        <i class="bi bi-x-circle-fill"></i> Rejected
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Application Details --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-500 font-bold text-xs sm:text-sm mb-1">Pemohon</p>
                                <p class="text-gray-900 font-black text-base sm:text-lg">{{ $application->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 font-bold text-xs sm:text-sm mb-1">Email</p>
                                <p class="text-gray-900 font-black text-base sm:text-lg">{{ $application->user->email }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-500 font-bold text-xs sm:text-sm mb-1">Provider</p>
                                <p class="text-gray-900 font-black text-base sm:text-lg">{{ $application->scholarship->provider->nama_instansi ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 font-bold text-xs sm:text-sm mb-1">Tanggal Apply</p>
                                <p class="text-gray-900 font-black text-base sm:text-lg">{{ \Carbon\Carbon::parse($application->tanggal_apply)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Motivasi/Catatan --}}
                @if($application->catatan)
                    <div class="bg-white border border-gray-100 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8 shadow-2xl">
                        <h3 class="text-lg sm:text-2xl font-black text-gray-900 mb-4 flex items-center gap-2 sm:gap-3">
                            <i class="bi bi-chat-left-text-fill text-blue-600"></i> Motivasi
                        </h3>
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-100 rounded-lg sm:rounded-2xl p-4 sm:p-6">
                            <p class="text-gray-700 font-bold text-sm sm:text-base leading-relaxed whitespace-pre-wrap">{{ $application->catatan }}</p>
                        </div>
                    </div>
                @endif

                {{-- Documents Section --}}
                <div class="bg-white border border-gray-100 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8 shadow-2xl">
                    <h3 class="text-lg sm:text-2xl font-black text-gray-900 mb-4 flex items-center gap-2 sm:gap-3">
                        <i class="bi bi-file-earmark-arrow-down-fill text-purple-600"></i> Dokumen Pendukung
                    </h3>

                    @if($application->documents->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            @foreach($application->documents as $document)
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-200 rounded-lg sm:rounded-2xl p-4 sm:p-6 hover:border-purple-400 transition group">
                                    <div class="flex items-start justify-between gap-4 mb-3">
                                        <div class="flex items-start gap-3 flex-1">
                                            <div class="w-10 sm:w-12 h-10 sm:h-12 rounded-lg sm:rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition text-lg sm:text-xl">
                                                @if(str_ends_with($document->file_path, '.pdf'))
                                                    <i class="bi bi-file-pdf-fill"></i>
                                                @elseif(in_array(pathinfo($document->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <i class="bi bi-image-fill"></i>
                                                @else
                                                    <i class="bi bi-file-earmark-fill"></i>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs sm:text-sm font-black text-gray-500 mb-1">{{ $document->jenis_dokumen }}</p>
                                                <p class="text-sm sm:text-base font-black text-gray-900 truncate">{{ $document->nama_file }}</p>
                                                <p class="text-xs text-gray-500 font-bold mt-1">{{ \Carbon\Carbon::parse($document->tanggal_upload)->format('d M Y H:i') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ route('documents.download', $document->id_dokumen) }}" class="flex-1 flex items-center justify-center gap-2 bg-purple-100 hover:bg-purple-200 text-purple-700 font-black py-2 sm:py-3 rounded-lg sm:rounded-xl transition text-xs sm:text-base">
                                            <i class="bi bi-download"></i> <span class="hidden sm:inline">Download</span>
                                        </a>
                                        @if(auth()->user()->id === $application->id_user)
                                            <form action="{{ route('documents.destroy', $document->id_dokumen) }}" method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus dokumen ini?')" class="w-full flex items-center justify-center gap-2 bg-red-100 hover:bg-red-200 text-red-700 font-black py-2 sm:py-3 rounded-lg sm:rounded-xl transition text-xs sm:text-base">
                                                    <i class="bi bi-trash"></i> <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if(auth()->user()->id === $application->id_user && $application->status === 'pending')
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <button onclick="document.getElementById('add-doc-form').classList.toggle('hidden')" class="flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black text-sm sm:text-base transition">
                                    <i class="bi bi-plus-circle-fill"></i> Tambah Dokumen
                                </button>

                                <div id="add-doc-form" class="hidden mt-4 bg-gradient-to-br from-purple-50 to-indigo-50 border-2 border-purple-200 rounded-lg sm:rounded-2xl p-4 sm:p-6">
                                    <form action="{{ route('documents.store', $application->id_application) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                        @csrf

                                        <div>
                                            <label class="block text-gray-700 font-black text-xs sm:text-base mb-2">Jenis Dokumen</label>
                                            <input type="text" name="jenis_dokumen" placeholder="Contoh: Ijazah, Transkrip Nilai" class="w-full bg-white border-2 border-gray-200 rounded-lg px-3 sm:px-4 py-2 sm:py-3 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition text-xs sm:text-base" required>
                                        </div>

                                        <div>
                                            <label class="block text-gray-700 font-black text-xs sm:text-base mb-2">Upload File</label>
                                            <input type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="w-full text-xs sm:text-base" required>
                                            <p class="text-xs text-gray-500 font-bold mt-1">Format: PDF, DOC, DOCX, JPG (Max 5MB)</p>
                                        </div>

                                        <div class="flex gap-2 pt-2">
                                            <button type="submit" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-black py-2 sm:py-3 rounded-lg transition text-xs sm:text-base">
                                                Upload
                                            </button>
                                            <button type="button" onclick="document.getElementById('add-doc-form').classList.add('hidden')" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-black py-2 sm:py-3 rounded-lg transition text-xs sm:text-base">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-dashed border-gray-300 rounded-lg sm:rounded-2xl p-8 text-center">
                            <div class="w-16 sm:w-20 h-16 sm:h-20 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center text-3xl sm:text-4xl mx-auto mb-4">
                                <i class="bi bi-file-earmark-x-fill"></i>
                            </div>
                            <p class="text-gray-600 font-black text-sm sm:text-base mb-4">Belum ada dokumen yang diunggah</p>
                            @if(auth()->user()->id === $application->id_user && $application->status === 'pending')
                                <button onclick="document.getElementById('add-doc-form').classList.toggle('hidden')" class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black text-xs sm:text-base transition">
                                    <i class="bi bi-plus-circle-fill"></i> Tambah Dokumen Pertama
                                </button>

                                <div id="add-doc-form" class="hidden mt-6 bg-gradient-to-br from-purple-50 to-indigo-50 border-2 border-purple-200 rounded-lg sm:rounded-2xl p-4 sm:p-6">
                                    <form action="{{ route('documents.store', $application->id_application) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                        @csrf

                                        <div>
                                            <label class="block text-gray-700 font-black text-xs sm:text-base mb-2">Jenis Dokumen</label>
                                            <input type="text" name="jenis_dokumen" placeholder="Contoh: Ijazah, Transkrip Nilai" class="w-full bg-white border-2 border-gray-200 rounded-lg px-3 sm:px-4 py-2 sm:py-3 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition text-xs sm:text-base" required>
                                        </div>

                                        <div>
                                            <label class="block text-gray-700 font-black text-xs sm:text-base mb-2">Upload File</label>
                                            <input type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="w-full text-xs sm:text-base" required>
                                            <p class="text-xs text-gray-500 font-bold mt-1">Format: PDF, DOC, DOCX, JPG (Max 5MB)</p>
                                        </div>

                                        <div class="flex gap-2 pt-2">
                                            <button type="submit" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-black py-2 sm:py-3 rounded-lg transition text-xs sm:text-base">
                                                Upload
                                            </button>
                                            <button type="button" onclick="document.getElementById('add-doc-form').classList.add('hidden')" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-black py-2 sm:py-3 rounded-lg transition text-xs sm:text-base">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6 sm:space-y-8">
                {{-- Status History --}}
                <div class="bg-white border border-gray-100 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8 shadow-2xl">
                    <h3 class="text-lg sm:text-2xl font-black text-gray-900 mb-6 flex items-center gap-2 sm:gap-3">
                        <i class="bi bi-clock-history text-blue-600"></i> Status History
                    </h3>

                    <div class="space-y-4">
                        @forelse($application->statusLogs as $log)
                            <div class="relative">
                                <div class="flex gap-4">
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-black text-white flex-shrink-0
                                            @if($log->status == 'pending') bg-yellow-500 @elseif($log->status == 'approved') bg-green-500 @else bg-red-500 @endif">
                                            @if($log->status == 'pending')
                                                <i class="bi bi-hourglass-split text-xs"></i>
                                            @elseif($log->status == 'approved')
                                                <i class="bi bi-check text-xs"></i>
                                            @else
                                                <i class="bi bi-x text-xs"></i>
                                            @endif
                                        </div>
                                        @if(!$loop->last)
                                            <div class="w-0.5 h-12 bg-gray-300 my-2"></div>
                                        @endif
                                    </div>
                                    <div class="flex-1 pb-4">
                                        <p class="text-xs sm:text-sm font-black text-gray-900 capitalize">{{ $log->status }}</p>
                                        <p class="text-xs text-gray-500 font-bold">{{ \Carbon\Carbon::parse($log->tanggal_status)->format('d M Y H:i') }}</p>
                                        @if($log->catatan)
                                            <p class="text-xs sm:text-sm text-gray-700 font-bold mt-2">{{ $log->catatan }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs sm:text-sm text-gray-500 font-bold">Belum ada history status</p>
                        @endforelse
                    </div>
                </div>

                {{-- Quick Info --}}
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 border-2 border-blue-100 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8">
                    <h3 class="text-lg sm:text-xl font-black text-gray-900 mb-4">Informasi Penting</h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-gray-700 font-bold">
                        <li class="flex gap-2 items-start">
                            <i class="bi bi-info-circle-fill text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Pantau status aplikasi kamu secara berkala</span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <i class="bi bi-info-circle-fill text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Dokumen harus jelas dan mudah dibaca</span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <i class="bi bi-info-circle-fill text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Hubungi provider jika ada pertanyaan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
