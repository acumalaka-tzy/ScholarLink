@extends('provider.provider')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Create Scholarship
    </h1>

    <p class="text-slate-400">
        Tambahkan beasiswa baru
    </p>

</div>

<form action="{{ route('provider.scholarships.store') }}"
      method="POST"
      class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-xl">

    @csrf

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Nama Beasiswa
        </label>

        <input type="text"
               name="nama_beasiswa"
               class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Kategori
        </label>

        <select
            name="id_kategori"
            class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">

            <option value="">-- Pilih Kategori --</option>

            <option value="1">Teknologi</option>
            <option value="2">Bisnis</option>
            <option value="3">Kesehatan</option>

        </select>

    </div>

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
                    <div class="absolute inset-y-0 right-5 flex items-center text-indigo-400 pointer-events-none">  ▼
                    </div>
                </div>

            </div>
            
            <div class="h-6"></div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Deskripsi
        </label>

        <textarea name="deskripsi"
                  rows="5"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white"></textarea>

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Syarat
        </label>

        <textarea name="syarat"
                  rows="4"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white"></textarea>

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Benefit
        </label>

        <textarea name="benefit"
                  rows="4"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white"></textarea>

    </div>

    <div class="mb-8">

        <label class="block mb-2 font-semibold">
            Deadline
        </label>

        <input type="date"
               name="deadline"
               class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">

    </div>

    <button
        class="bg-indigo-600 hover:bg-indigo-700 px-8 py-3 rounded-2xl font-semibold shadow-lg">

        Simpan

    </button>

</form>

@endsection