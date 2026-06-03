@extends('admin.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
            <div class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            Scholarship Management
        </div>

        <div class="flex items-center gap-5">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                <i class="bi bi-pencil-square"></i>
            </div>
            <div>
                <h1 class="text-4xl font-black text-gray-900">Edit Beasiswa</h1>
                <p class="text-gray-500 font-bold mt-2 text-lg">Perbarui informasi beasiswa ScholarLink.</p>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="bi bi-exclamation-circle-fill"></i>
                </div>
                <div>
                    <h4 class="font-black text-red-700 text-lg mb-2">Terjadi Kesalahan</h4>
                    <ul class="space-y-1 text-red-600 font-bold text-sm">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 md:p-10 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900">Informasi Beasiswa</h2>
                    <p class="text-gray-500 font-bold mt-1">Edit seluruh data beasiswa dengan detail terbaru.</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.scholarships.update', $scholarship->id_beasiswa) }}"
            method="POST"
            class="p-8 md:p-10 space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                <h3 class="font-black text-lg text-gray-900 mb-4">
                    Detail Beasiswa
                </h3>

                <div class="space-y-3">
                    <p><strong>Nama:</strong> {{ $scholarship->nama_beasiswa }}</p>
                    <p><strong>Tipe:</strong> {{ $scholarship->tipe }}</p>
                    <p><strong>Deadline:</strong> {{ $scholarship->deadline }}</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">
                    Status Beasiswa
                </label>

                <select name="status"
                        class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-4 font-bold">
                    <option value="aktif"
                        {{ $scholarship->status == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="nonaktif"
                        {{ $scholarship->status == 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                    <option value="ditutup"
                        {{ $scholarship->status == 'ditutup' ? 'selected' : '' }}>
                        Ditutup
                    </option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-black">
                    Update Status
                </button>

                <a href="{{ route('admin.scholarships.index') }}"
                class="bg-gray-100 px-8 py-4 rounded-2xl font-black">
                    Kembali
                </a>
            </div>
        </form>
            </div>
        </div>
@endsection
