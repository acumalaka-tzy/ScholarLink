@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-12 px-3 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-3xl mx-auto">
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('scholarships.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Daftar Beasiswa
            </a>
        </div>

        <div class="mb-6 sm:mb-10 text-center">
            <div class="inline-flex items-center justify-center w-16 sm:w-24 h-16 sm:h-24 rounded-lg sm:rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white shadow-xl shadow-blue-500/20 mb-4 sm:mb-6">
                <i class="bi bi-mortarboard-fill text-3xl sm:text-5xl"></i>
            </div>
            <h1 class="text-2xl sm:text-5xl font-black text-gray-900 mb-2 sm:mb-4">Apply Scholarship</h1>
            <p class="text-gray-500 text-xs sm:text-lg font-bold">Lengkapi form pengajuan beasiswa dan upload dokumen.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl sm:rounded-[2rem] shadow-2xl overflow-hidden">
        <div class="h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
            <div class="p-5 sm:p-8 md:p-10">
                @if ($errors->any())
                    <div class="mb-6 sm:mb-8 bg-red-50 border border-red-200 rounded-lg sm:rounded-3xl p-4 sm:p-6">
                        <h4 class="font-black text-red-700 mb-2">Terjadi Kesalahan</h4>
                        <ul class="space-y-1 text-red-600 font-bold text-xs sm:text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">                    @csrf

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Pilih Beasiswa</label>

                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-award-fill"></i>
                            </div>

                            @if($selectedScholarship)
                                <input type="hidden" name="id_beasiswa" value="{{ $selectedScholarship->id_beasiswa }}">
                                <div class="w-full appearance-none bg-gray-100 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-4 py-2.5 sm:py-4 font-bold text-gray-900 cursor-not-allowed text-xs sm:text-base flex items-center">
                                    {{ $selectedScholarship->nama_beasiswa }}
                                </div>
                            @else
                                <select name="id_beasiswa" required onchange="window.location.href='?id_beasiswa=' + this.value" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-10 py-2.5 sm:py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
                                    <option value="">-- Pilih Beasiswa --</option>

                                    @foreach($scholarships as $scholarship)
                                        <option value="{{ $scholarship->id_beasiswa }}"
                                            {{ old('id_beasiswa', request('id_beasiswa')) == $scholarship->id_beasiswa ? 'selected' : '' }}>
                                            {{ $scholarship->nama_beasiswa }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Catatan / Motivasi</label>

                        <textarea name="catatan" rows="5" placeholder="Tulis alasan mengapa kamu layak mendapatkan beasiswa ini..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl px-4 py-3 font-bold text-gray-900 placeholder:text-gray-400 resize-none focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">{{ old('catatan') }}</textarea>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-gray-700 font-black text-sm sm:text-lg mb-4">
                            Upload Dokumen Pendukung
                        </h3>

                        @if($selectedScholarship)
                            @if(!empty($selectedScholarship->required_documents))
                                <div class="space-y-6">
                                    @foreach($selectedScholarship->required_documents as $index => $docName)
                                        <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-5">
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-gray-700 font-black mb-2 text-sm">{{ $docName }} <span class="text-red-500">*</span></label>
                                                    <input type="hidden" name="documents[{{ $index }}][jenis_dokumen]" value="{{ $docName }}">
                                                    <input type="file" name="documents[{{ $index }}][file]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-bold text-gray-900 focus:outline-none focus:border-cyan-500" required>
                                                    <p class="text-xs text-gray-500 font-bold mt-2">Format: PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal 5MB.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 text-yellow-700 font-bold text-sm">
                                    Provider belum menentukan syarat dokumen untuk beasiswa ini. Anda bisa mengunggah dokumen pendukung secara opsional jika mau, tapi fitur belum tersedia untuk beasiswa ini.
                                </div>
                            @endif
                        @else
                            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 text-center text-blue-700">
                                <i class="bi bi-info-circle text-2xl mb-2 block"></i>
                                <p class="font-bold text-sm">Silakan pilih beasiswa terlebih dahulu pada form di atas untuk melihat daftar dokumen yang harus diunggah.</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <a href="{{ route('scholarships.index') }}" class="flex items-center justify-center gap-2 px-6 sm:px-8 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition text-gray-700 py-3 rounded-lg sm:rounded-2xl font-black text-xs sm:text-base w-full sm:w-auto">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" class="flex items-center justify-center gap-2 flex-1 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white py-3 rounded-lg sm:rounded-2xl font-black shadow-xl shadow-blue-500/20 text-xs sm:text-base">
                            <i class="bi bi-send-fill"></i> Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection