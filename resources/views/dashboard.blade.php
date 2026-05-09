@extends('layouts.app')

@section('content')
    <div class="mb-12">
        <div class="bg-linear-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 md:p-12 text-white shadow-xl">
            <h2 class="text-4xl md:text-5xl font-bold mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-indigo-100 text-lg">Jelajahi beasiswa terbaru dan kelola aplikasi Anda dengan mudah</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="stat-card card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Beasiswa</p>
                    <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">1,250</p>
                </div>
                <span class="text-4xl">📚</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Tersedia untuk Anda</p>
        </div>

        <div class="stat-card card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Aplikasi Anda</p>
                    <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">3</p>
                </div>
                <span class="text-4xl">📋</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Sedang diproses</p>
        </div>

        <div class="stat-card card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Diterima</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">1</p>
                </div>
                <span class="text-4xl">✅</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-4">Beasiswa aktif</p>
        </div>

        <div class="stat-card-primary card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-indigo-200 text-sm font-medium">Profil Kelengkapan</p>
                    <p class="text-4xl font-bold mt-2">75%</p>
                </div>
                <span class="text-4xl">📊</span>
            </div>
            <p class="text-indigo-200 text-sm mt-4">Lengkapi profil Anda</p>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Aplikasi Beasiswa Saya</h3>
            <div class="space-y-5 mb-6">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6 card-hover border-l-4 border-green-500">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white">Beasiswa Penuh S1 - UI</h4>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Universitas Indonesia</p>
                        </div>
                        <span class="badge badge-success">DITERIMA</span>
                    </div>
                    <button class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg font-medium text-sm">Lihat Detail</button>
                </div>
            </div>
            <button class="w-full py-3 border-2 border-indigo-600 text-indigo-600 rounded-lg font-bold hover:bg-indigo-50 transition">
                Lihat Semua Aplikasi →
            </button>
        </div>

        <div class="space-y-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-6">
                <h4 class="text-lg font-bold mb-6">👤 Profil Saya</h4>
                <div class="space-y-4 text-sm">
                    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                <button class="w-full mt-6 py-2 border-2 border-indigo-600 text-indigo-600 rounded-lg font-medium">Edit Profil</button>
            </div>
        </div>
    </div>
@endsection