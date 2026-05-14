@extends('admin.admin')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
        Edit Provider
    </h1>

    <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">
        Perbarui data provider ScholarLink
    </p>

</div>

<form action="{{ route('providers.update', ['provider' => $provider->id_provider]) }}"
      method="POST"
      class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-gray-100 dark:border-slate-700 p-8">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Nama Instansi -->
        <div>

            <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
                Nama Instansi
            </label>

            <input type="text"
                   name="nama_instansi"
                   value="{{ old('nama_instansi', $provider->nama_instansi) }}"
                   class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

        </div>

        <!-- Email -->
        <div>

            <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
                Email
            </label>

            <input type="email"
                   name="email_kontak"
                   value="{{ old('email_kontak', $provider->email_kontak) }}"
                   class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

        </div>

        <!-- No HP -->
        <div>

            <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
                No HP
            </label>

            <input type="text"
                   name="no_hp"
                   value="{{ old('no_hp', $provider->no_hp) }}"
                   class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

        </div>

        <!-- Website -->
        <div>

            <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
                Website
            </label>

            <input type="text"
                   name="website"
                   value="{{ old('website', $provider->website) }}"
                   class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

        </div>

    </div>

    <!-- Alamat -->
    <div class="mt-6">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
            Alamat
        </label>

        <textarea
            name="alamat"
            rows="4"
            class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('alamat', $provider->alamat) }}</textarea>

    </div>

    <!-- Deskripsi -->
    <div class="mt-6">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">
            Deskripsi
        </label>

        <textarea
            name="deskripsi_instansi"
            rows="5"
            class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-4 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('deskripsi_instansi', $provider->deskripsi_instansi) }}</textarea>

    </div>

    <!-- Button -->
    <div class="mt-8 flex gap-4">

        <button
            type="submit"
            class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-2xl shadow-lg font-semibold transition duration-200 hover:scale-105">

            Simpan Perubahan

        </button>

        <a href="{{ route('providers.index') }}"
           class="bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-white px-6 py-3 rounded-2xl font-semibold transition duration-200">

            Kembali

        </a>

    </div>

</form>

@endsection