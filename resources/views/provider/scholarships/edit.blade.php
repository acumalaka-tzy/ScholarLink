@extends('provider.provider')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] px-4 sm:px-6 lg:px-10 py-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-5xl mx-auto">
        <div class="mb-12">
            <div class="inline-flex items-center gap-3 bg-white border border-gray-200 rounded-full px-5 py-3 mb-6 shadow-lg">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-sm">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span class="text-gray-700 text-sm font-black tracking-wide">ScholarLink Provider Panel</span>
            </div>
            <h1 class="text-5xl sm:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                Edit <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Scholarship</span>
            </h1>
            <p class="text-gray-500 mt-5 text-lg max-w-3xl leading-relaxed font-bold">
                Perbarui informasi scholarship dengan tampilan modern, profesional, dan pengalaman pengelolaan terbaik.
            </p>
        </div>

        <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>

            <div class="relative p-8 sm:p-10">
                <div class="flex items-start gap-5 mb-10">
                    <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-4xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                        <i class="bi bi-pencil-fill"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 leading-tight">Update Scholarship Program</h2>
                        <p class="mt-3 text-gray-500 leading-relaxed font-bold max-w-2xl">
                            Pastikan seluruh informasi scholarship selalu terbaru agar mahasiswa mendapatkan detail yang akurat.
                        </p>
                    </div>
                </div>

                <form action="{{ route('provider.scholarships.update', $scholarship->id_beasiswa) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Scholarship Name</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <input type="text" name="nama_beasiswa" value="{{ $scholarship->nama_beasiswa }}" placeholder="Masukkan nama scholarship" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Description</label>
                        <textarea name="deskripsi" rows="6" placeholder="Tulis deskripsi lengkap scholarship" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition resize-none">{{ $scholarship->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Requirements</label>
                        <textarea name="syarat" rows="5" placeholder="Tulis persyaratan scholarship" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition resize-none">{{ $scholarship->syarat }}</textarea>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <label class="block text-gray-700 font-black mb-3 text-lg">Required Documents</label>
                        <p class="text-sm text-gray-500 font-bold mb-4">Tambahkan daftar dokumen yang wajib diunggah pelamar beasiswa ini (misalnya: Scan KTP, CV, Ijazah, Transkrip Nilai).</p>

                        <div id="documents-container" class="space-y-4"></div>

                        <button type="button" onclick="addDocumentField()" class="mt-4 flex items-center gap-2 text-purple-600 hover:text-purple-700 font-black text-xs sm:text-base">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Syarat Dokumen
                        </button>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Benefits</label>
                        <textarea name="benefit" rows="5" placeholder="Tulis benefit scholarship" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition resize-none">{{ $scholarship->benefit }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Application Deadline</label>
                        <div class="relative">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="bi bi-calendar-event-fill"></i>
                            </div>
                            <input type="date" name="deadline" value="{{ $scholarship->deadline }}" onclick="this.showPicker()" class="w-full cursor-pointer bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-5 text-gray-900 font-bold focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                        </div>
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="group relative overflow-hidden inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98]">
                            <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                            <span class="relative flex items-center gap-3">
                                <i class="bi bi-save-fill"></i> Update Scholarship
                            </span>
                        </button>

                        <a href="{{ route('provider.scholarships.index') }}" class="inline-flex items-center justify-center gap-3 bg-gray-100 hover:bg-gray-200 transition px-8 py-5 rounded-2xl font-black text-gray-700 border border-gray-200">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let documentCount = 0;
const existingDocuments = @json($scholarship->required_documents ?? []);

function addDocumentField(value = '') {
    const container = document.getElementById('documents-container');
    const id = documentCount++;

    const documentHTML = `
        <div class="document-entry flex gap-3 items-center" id="document-${id}">
            <input type="text" name="required_documents[]" value="${value}" placeholder="Contoh: KTP, Ijazah, Transkrip Nilai" class="flex-1 bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-bold text-gray-900 focus:outline-none focus:border-purple-500" required>
            <button type="button" onclick="removeDocumentField(${id})" class="w-12 h-12 rounded-xl bg-red-100 text-red-500 hover:bg-red-200 flex items-center justify-center flex-shrink-0 transition">
                <i class="bi bi-x-lg"></i>
            </button>
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
    if (existingDocuments && existingDocuments.length > 0) {
        existingDocuments.forEach(doc => addDocumentField(doc));
    } else {
        addDocumentField();
    }
});
</script>
@endsection
