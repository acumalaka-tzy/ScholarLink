@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('katalog.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2">
        ← Kembali ke Katalog
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-slate-700">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-3xl text-indigo-600">
                    🏛️
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Beasiswa KSE 2026</h1>
                    <p class="text-gray-500 font-medium">Yayasan Karya Salemba Empat</p>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <span class="badge badge-success">Pendaftaran Dibuka</span>
                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-700 rounded-lg text-xs font-semibold text-gray-600 dark:text-gray-300 italic">Terakhir diperbarui: 2 jam yang lalu</span>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-slate-700">
            <h3 class="text-xl font-bold mb-4 border-b pb-2">Deskripsi Beasiswa</h3>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-8">
                Beasiswa Karya Salemba Empat (KSE) diberikan kepada mahasiswa di tingkat strata satu (S1) yang telah menempuh minimal semester kedua. Program ini tidak hanya memberikan bantuan finansial, tetapi juga pembekalan berupa program pembinaan kepemimpinan (leadership), seminar, dan workshop secara berkala.
            </p>

            <h3 class="text-xl font-bold mb-4 border-b pb-2">Persyaratan Dokumen</h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3 text-gray-600 dark:text-gray-400">
                    <span class="text-green-500 font-bold">✓</span> Pas Foto 4x6 (Background Bebas)
                </li>
                <li class="flex items-start gap-3 text-gray-600 dark:text-gray-400">
                    <span class="text-green-500 font-bold">✓</span> Kartu Tanda Mahasiswa (KTM)
                </li>
                <li class="flex items-start gap-3 text-gray-600 dark:text-gray-400">
                    <span class="text-green-500 font-bold">✓</span> Kartu Hasil Studi (KHS) Semester Terakhir
                </li>
                <li class="flex items-start gap-3 text-gray-600 dark:text-gray-400">
                    <span class="text-green-500 font-bold">✓</span> Curriculum Vitae (CV)
                </li>
                <li class="flex items-start gap-3 text-gray-600 dark:text-gray-400">
                    <span class="text-green-500 font-bold">✓</span> Surat Pernyataan tidak sedang menerima beasiswa lain
                </li>
            </ul>
        </div>
    </div>

<div class="space-y-6">
    <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-lg border border-indigo-100 dark:border-slate-700">
        <h4 class="font-bold text-gray-900 dark:text-white mb-4">Informasi Penting</h4>
        
        <div class="space-y-4 mb-6">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Batas Akhir:</span>
                <span class="font-bold text-red-500">31 Mei 2026</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Cakupan:</span>
                <span class="font-bold text-gray-900 dark:text-white">Biaya Hidup + Pelatihan</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Tingkat:</span>
                <span class="font-bold text-gray-900 dark:text-white">S1 (Minimal Sem 2)</span>
            </div>
        </div>

        <div class="space-y-3">
            <button class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-md transition">
                Daftar Sekarang
            </button>
            <p class="text-center text-[10px] text-gray-400">
                *Pastikan dokumen Anda telah lengkap sebelum mendaftar.
            </p>
        </div>
    </div>

    <div class="bg-slate-50 dark:bg-slate-900 rounded-2xl p-6 border border-gray-100 dark:border-slate-800">
        <h4 class="font-bold text-sm mb-3 text-gray-900 dark:text-white">Tentang Penyelenggara</h4>
        <p class="text-xs text-gray-500 leading-relaxed">
            Yayasan Karya Salemba Empat memiliki visi untuk ikut serta dalam upaya mencerdaskan kehidupan bangsa melalui pemberian bantuan beasiswa bagi mahasiswa yang memiliki keterbatasan finansial.
        </p>
    </div>
</div>
</div>
@endsection