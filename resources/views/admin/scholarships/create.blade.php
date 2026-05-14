@extends('admin.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-white">
            Tambah Beasiswa
        </h1>

        <p class="text-slate-400 mt-2">
            Tambahkan data beasiswa baru ke ScholarLink
        </p>

    </div>

    <div class="bg-slate-800/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-700 p-8">

        <form action="{{ route('admin.scholarships.store') }}"
              method="POST"
              class="space-y-7">

            @csrf

            {{-- Nama --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Nama Beasiswa
                </label>

                <input
                    type="text"
                    name="nama_beasiswa"
                    placeholder="Contoh: Beasiswa LPDP 2026"
                    class="w-full rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200">

            </div>

            {{-- Tipe --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Tipe
                </label>

                <div class="relative">

                    <select
                        name="tipe"
                        class="w-full appearance-none rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200">

                        <option value="Fully Funded">
                            🎓 Fully Funded
                        </option>

                        <option value="Partial">
                            💰 Partial
                        </option>

                        <option value="Exchange">
                            🌍 Exchange
                        </option>

                    </select>

                    <div class="absolute inset-y-0 right-5 flex items-center text-indigo-400 pointer-events-none">
                        ▼
                    </div>

                </div>

            </div>

            {{-- Deadline --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    class="w-full rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200">

            </div>

            {{-- Deskripsi --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    placeholder="Deskripsi lengkap beasiswa..."
                    class="w-full rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg resize-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200"></textarea>

            </div>

            {{-- Syarat --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Syarat
                </label>

                <textarea
                    name="syarat"
                    rows="5"
                    placeholder="Masukkan syarat beasiswa..."
                    class="w-full rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg resize-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200"></textarea>

            </div>

            {{-- Benefit --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Benefit
                </label>

                <textarea
                    name="benefit"
                    rows="5"
                    placeholder="Masukkan benefit beasiswa..."
                    class="w-full rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg resize-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200"></textarea>

            </div>

            {{-- Status --}}
            <div>

                <label class="block mb-3 font-semibold text-slate-200">
                    Status
                </label>

                <div class="relative">

                    <select
                        name="status"
                        class="w-full appearance-none rounded-2xl border border-indigo-500/20 bg-slate-900 text-white px-5 py-4 shadow-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 outline-none transition duration-200">

                        <option value="aktif">
                            🟢 Aktif
                        </option>

                        <option value="draft">
                            🟡 Draft
                        </option>

                        <option value="tutup">
                            🔴 Tutup
                        </option>

                    </select>

                    <div class="absolute inset-y-0 right-5 flex items-center text-indigo-400 pointer-events-none">
                        ▼
                    </div>

                </div>

            </div>

            {{-- Button --}}
            <div class="pt-5 flex items-center gap-4">

                <button
                    class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:scale-105 hover:shadow-indigo-500/30 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl transition duration-300">

                    Simpan Beasiswa

                </button>

                <a href="{{ route('admin.scholarships.index') }}"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-8 py-4 rounded-2xl font-semibold transition duration-200">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection