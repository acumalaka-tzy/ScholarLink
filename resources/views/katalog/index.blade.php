@extends('layouts.app')

@section('content')
<div class="mb-10">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Katalog Beasiswa 🎓</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Temukan peluang beasiswa yang sesuai dengan kualifikasi Anda.</p>
        </div>
        
        <div class="relative">
            <input type="text" placeholder="Cari beasiswa..." 
                class="w-full md:w-80 px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:outline-none dark:bg-slate-800 dark:border-slate-700">
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    
    <div class="stat-card card-hover flex flex-col justify-between border-t-4 border-indigo-500 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm">
        <div>
            <div class="flex justify-between items-start mb-4">
                <div class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-xs font-bold uppercase">Yayasan</div>
                <span class="badge badge-success">Buka</span>
            </div>
            
            <h4 class="text-xl font-bold text-gray-900 dark:text-white">Beasiswa KSE 2026</h4>
            <p class="text-gray-500 text-sm mt-1">Karya Salemba Empat</p>
            
            <div class="my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">
                    Program beasiswa untuk mahasiswa jenjang S1 yang telah menempuh minimal semester 2. Mencakup tunjangan biaya hidup dan program pembinaan.
                </p>
            </div>
            
            <div class="flex items-center gap-4 text-xs text-gray-500 mb-6">
                <span class="flex items-center gap-1">📍 Nasional</span>
                <span class="flex items-center gap-1">⏳ 31 Mei 2026</span>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <a href="#" class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition">
                Daftar Sekarang
            </a>
            <a href="{{ route('katalog.detail') }}" class="w-full text-center py-2.5 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                Lihat Detail
            </a>
        </div>
    </div>

    <div class="stat-card card-hover flex flex-col justify-between border-t-4 border-purple-500 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm">
        <div>
            <div class="flex justify-between items-start mb-4">
                <div class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg text-xs font-bold uppercase">Pemerintah</div>
                <span class="badge badge-success">Buka</span>
            </div>
            
            <h4 class="text-xl font-bold text-gray-900 dark:text-white">Beasiswa Unggulan</h4>
            <p class="text-gray-500 text-sm mt-1">Kemendikbud Ristek</p>
            
            <div class="my-4 py-3 border-y border-gray-100 dark:border-slate-700">
                <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">
                    Pemberian biaya pendidikan oleh pemerintah Indonesia kepada putra-putri terbaik bangsa dan pegawai Kemendikbudristek.
                </p>
            </div>
            
            <div class="flex items-center gap-4 text-xs text-gray-500 mb-6">
                <span class="flex items-center gap-1">📍 Nasional</span>
                <span class="flex items-center gap-1">⏳ 15 Juli 2026</span>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <a href="#" class="w-full text-center py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-bold transition">
                Daftar Sekarang
            </a>
            <a href="{{ route('katalog.detail') }}" class="w-full text-center py-2.5 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                Lihat Detail
            </a>
        </div>
    </div>

</div>
@endsection