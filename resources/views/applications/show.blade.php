@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-5xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('applications.index') }}"
               class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black">
                <span class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center">
                    <i class="bi bi-arrow-left"></i>
                </span>
                Kembali ke Applications
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white rounded-[2rem] p-8 shadow-xl border border-gray-100">
                    <h1 class="text-4xl font-black text-gray-900 mb-2">
                        {{ $application->scholarship->nama_beasiswa }}
                    </h1>

                    <p class="text-gray-500 font-bold mb-5">
                        {{ $application->scholarship->deskripsi }}
                    </p>

                    @if($application->status == 'pending')
                        <span class="px-5 py-2 rounded-full bg-yellow-100 text-yellow-700 font-black">
                            🟡 Pending
                        </span>
                    @elseif($application->status == 'approved')
                        <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-black">
                            🟢 Approved
                        </span>
                    @else
                        <span class="px-5 py-2 rounded-full bg-red-100 text-red-700 font-black">
                            🔴 Rejected
                        </span>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
                        <div>
                            <p class="text-gray-500 font-bold text-sm">Pemohon</p>
                            <p class="font-black text-gray-900">{{ $application->user->name }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 font-bold text-sm">Provider</p>
                            <p class="font-black text-gray-900">
                                {{ $application->scholarship->provider->nama_instansi ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 font-bold text-sm">Email</p>
                            <p class="font-black text-gray-900">{{ $application->user->email }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 font-bold text-sm">Tanggal Apply</p>
                            <p class="font-black text-gray-900">
                                {{ \Carbon\Carbon::parse($application->tanggal_apply)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                @if($application->catatan)
                    <div class="bg-white rounded-[2rem] p-8 shadow-xl border border-gray-100">
                        <h3 class="text-2xl font-black text-gray-900 mb-4">
                            <i class="bi bi-chat-left-text-fill text-blue-600"></i>
                            Motivasi
                        </h3>

                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">
                            <p class="text-gray-700 font-bold whitespace-pre-wrap">
                                {{ $application->catatan }}
                            </p>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded-[2rem] p-8 shadow-xl border border-gray-100">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-2xl font-black text-gray-900">
                            <i class="bi bi-file-earmark-arrow-down-fill text-purple-600"></i>
                            Dokumen Pendukung
                        </h3>

                        <span class="px-4 py-2 rounded-full bg-purple-100 text-purple-700 font-black text-sm">
                            {{ $application->documents->count() }} Dokumen
                        </span>
                    </div>

                    @if($application->documents->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            @foreach($application->documents as $document)
                                <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-5">
                                    <div class="flex items-start gap-3 mb-4">
                                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                                            @if(str_ends_with(strtolower($document->file_path), '.pdf'))
                                                <i class="bi bi-file-pdf-fill"></i>
                                            @elseif(in_array(strtolower(pathinfo($document->file_path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']))
                                                <i class="bi bi-image-fill"></i>
                                            @else
                                                <i class="bi bi-file-earmark-fill"></i>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <p class="font-black text-gray-500 text-sm">
                                                {{ $document->jenis_dokumen }}
                                            </p>

                                            <p class="font-black text-gray-900 truncate">
                                                {{ $document->nama_file }}
                                            </p>

                                            <p class="text-xs text-gray-500 font-bold">
                                                {{ \Carbon\Carbon::parse($document->tanggal_upload)->format('d M Y H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ route('documents.download', $document->id_dokumen) }}"
                                           class="flex-1 text-center bg-purple-100 hover:bg-purple-200 text-purple-700 font-black py-3 rounded-xl">
                                            <i class="bi bi-download"></i> Download
                                        </a>

                                        @if(auth()->user()->id === $application->id_user && $application->status === 'pending')
                                            <form action="{{ route('documents.destroy', $document->id_dokumen) }}"
                                                  method="POST"
                                                  class="flex-1">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Hapus dokumen ini?')"
                                                        class="w-full bg-red-100 hover:bg-red-200 text-red-700 font-black py-3 rounded-xl">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center">
                            <i class="bi bi-file-earmark-x-fill text-5xl text-gray-400"></i>
                            <p class="text-gray-600 font-black mt-4">
                                Belum ada dokumen yang diunggah
                            </p>
                        </div>
                    @endif

                    @if(auth()->user()->id === $application->id_user && $application->status === 'pending')
                        <div class="mt-6 pt-6 border-t border-gray-200">

                            <button type="button"
                                    onclick="document.getElementById('add-doc-form').classList.toggle('hidden')"
                                    class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black">
                                <i class="bi bi-plus-circle-fill"></i>
                                Tambah Dokumen
                            </button>

                            <div id="add-doc-form"
                                 class="hidden mt-5 bg-purple-50 border-2 border-purple-200 rounded-2xl p-6">

                                <form action="{{ route('documents.store') }}"
                                      method="POST"
                                      enctype="multipart/form-data"
                                      class="space-y-4">

                                    @csrf

                                    <input type="hidden"
                                           name="id_application"
                                           value="{{ $application->id_application }}">

                                    <div>
                                        <label class="block text-gray-700 font-black mb-2">
                                            Jenis Dokumen
                                        </label>

                                        <input type="text"
                                               name="jenis_dokumen"
                                               placeholder="Contoh: KTP, CV, Transkrip Nilai"
                                               class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 font-bold focus:outline-none focus:border-purple-500"
                                               required>
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-black mb-2">
                                            Upload File
                                        </label>

                                        <input type="file"
                                               name="file"
                                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                               class="w-full border-2 border-gray-200 rounded-xl px-4 py-3"
                                               required>

                                        <p class="text-xs text-gray-500 mt-2 font-bold">
                                            PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal 2MB.
                                        </p>
                                    </div>

                                    <div class="flex gap-3">
                                        <button type="submit"
                                                class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-black py-3 rounded-xl">
                                            Upload Dokumen
                                        </button>

                                        <button type="button"
                                                onclick="document.getElementById('add-doc-form').classList.add('hidden')"
                                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-black py-3 rounded-xl">
                                            Batal
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="space-y-8">

                <div class="bg-white rounded-[2rem] p-8 shadow-xl border border-gray-100">
                    <h3 class="text-2xl font-black text-gray-900 mb-5">
                        <i class="bi bi-clock-history text-blue-600"></i>
                        Status History
                    </h3>

                    <div class="space-y-4">
                        @forelse($application->statusLogs as $log)
                            <div>
                                <p class="font-black capitalize">
                                    {{ $log->status }}
                                </p>

                                <p class="text-xs text-gray-500 font-bold">
                                    {{ \Carbon\Carbon::parse($log->tanggal_status)->format('d M Y H:i') }}
                                </p>

                                @if($log->catatan)
                                    <p class="text-sm text-gray-700 font-bold mt-1">
                                        {{ $log->catatan }}
                                    </p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 font-bold">
                                Belum ada history status
                            </p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-blue-50 border-2 border-blue-100 rounded-[2rem] p-8">
                    <h3 class="text-xl font-black text-gray-900 mb-4">
                        Informasi Penting
                    </h3>

                    <ul class="space-y-3 text-sm text-gray-700 font-bold">
                        <li>• Pantau status aplikasi kamu secara berkala</li>
                        <li>• Dokumen harus jelas dan mudah dibaca</li>
                        <li>• Hubungi provider jika ada pertanyaan</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection