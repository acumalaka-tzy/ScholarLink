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

                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-black mb-2 sm:mb-3 text-xs sm:text-lg">Pilih Beasiswa</label>

                        <div class="relative">
                            <div class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i class="bi bi-award-fill"></i>
                            </div>

                            <select name="id_beasiswa" required class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-lg sm:rounded-2xl pl-10 sm:pl-14 pr-10 py-2.5 sm:py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition text-xs sm:text-base">
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

                        <div id="documents-container" class="space-y-4"></div>

                        <button type="button" onclick="addDocumentField()" class="mt-4 flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black text-xs sm:text-base">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Dokumen
                        </button>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <a href="{{ route('scholarships.index') }}" class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 border border-gray-200 transition text-gray-700 py-3 rounded-lg sm:rounded-2xl font-black text-xs sm:text-base">
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

<script>
let documentCount = 0;

function addDocumentField() {
    const container = document.getElementById('documents-container');
    const id = documentCount++;

    const documentHTML = `
        <div class="document-entry bg-gray-50 border-2 border-gray-200 rounded-2xl p-5 relative" id="document-${id}">
            <button type="button" onclick="removeDocumentField(${id})" class="absolute top-3 right-3 w-8 h-8 rounded-lg bg-red-100 text-red-500 hover:bg-red-200 flex items-center justify-center">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-black mb-2 text-sm">Jenis Dokumen</label>
                    <input type="text" name="documents[${id}][jenis_dokumen]" placeholder="Contoh: KTP, Ijazah, Transkrip Nilai" class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-bold text-gray-900 focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-2 text-sm">Upload File</label>
                    <input type="file" name="documents[${id}][file]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-bold text-gray-900 focus:outline-none focus:border-purple-500" required>
                    <p class="text-xs text-gray-500 font-bold mt-2">Format: PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal 5MB.</p>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', documentHTML);
}

function removeDocumentField(id) {
    const element = document.getElementById(`document-${id}`);
    if (element) {
        element.remove();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    addDocumentField();
});
</script>
@endsection