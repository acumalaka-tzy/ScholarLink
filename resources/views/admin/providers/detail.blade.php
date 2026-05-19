@extends('admin.admin')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
        Detail Provider
    </h1>

    <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">
        Informasi lengkap provider ScholarLink
    </p>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg border border-gray-100 dark:border-slate-700 p-8">

    <!-- Header -->
    <div class="flex items-center justify-between flex-wrap gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ $provider->nama_instansi }}
            </h2>

            <p class="text-gray-500 dark:text-gray-400 mt-1">
                Provider ID: #{{ $provider->id_provider }}
            </p>

        </div>

        <span class="
            px-4 py-2 rounded-full text-sm font-semibold

            @if($provider->status == 'verified')
                bg-emerald-100 text-emerald-600

            @elseif($provider->status == 'pending')
                bg-amber-100 text-amber-600

            @else
                bg-rose-100 text-rose-600
            @endif
        ">

            {{ ucfirst($provider->status) }}

        </span>

    </div>

    <!-- Information Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-gray-50 dark:bg-slate-900 rounded-2xl p-5">

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                Email Kontak
            </p>

            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $provider->email_kontak ?? '-' }}
            </p>

        </div>

        <div class="bg-gray-50 dark:bg-slate-900 rounded-2xl p-5">

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                Nomor HP
            </p>

            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $provider->no_hp ?? '-' }}
            </p>

        </div>

        <div class="bg-gray-50 dark:bg-slate-900 rounded-2xl p-5">

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                Website
            </p>

            <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400 break-all">
                {{ $provider->website ?? '-' }}
            </p>

        </div>

        <div class="bg-gray-50 dark:bg-slate-900 rounded-2xl p-5">

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                Total Scholarship
            </p>

            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $provider->scholarships->count() }}
            </p>

        </div>

    </div>

    <!-- Alamat -->
    <div class="mt-8 bg-gray-50 dark:bg-slate-900 rounded-2xl p-6">

        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">
            Alamat
        </h3>

        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
            {{ $provider->alamat ?? '-' }}
        </p>

    </div>

    <!-- Deskripsi -->
    <div class="mt-6 bg-gray-50 dark:bg-slate-900 rounded-2xl p-6">

        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3">
            Deskripsi Instansi
        </h3>

        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
            {{ $provider->deskripsi_instansi ?? '-' }}
        </p>

    </div>

    <!-- Action -->
    <div class="mt-8 flex flex-wrap gap-4">

        <a href="{{ route('admin.providers.edit', $provider->id_provider) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl font-semibold transition duration-200 shadow-md hover:scale-105">

            Edit Provider

        </a>

        <a href="{{ route('admin.providers.index') }}"
           class="bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-white px-6 py-3 rounded-2xl font-semibold transition duration-200">

            Kembali

        </a>

    </div>

</div>

@endsection