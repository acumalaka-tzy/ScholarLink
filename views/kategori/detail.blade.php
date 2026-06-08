@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-10 px-4 md:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-0">
        <div class="mb-8">
            <a href="{{ route('kategori.index') }}" class="inline-flex items-center gap-3 text-blue-600 hover:text-cyan-600 font-black transition group">
                <div class="w-10 h-10 rounded-2xl bg-white border border-gray-200 flex items-center justify-center shadow-md group-hover:-translate-x-1 transition">
                    <i class="bi bi-arrow-left"></i>
                </div>
                Kembali ke Katalog
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 space-y-8">
                <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] p-8 shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
                    <div class="absolute top-0 right-0 w-72 h-72 bg-cyan-100 rounded-full blur-3xl opacity-40"></div>
                    
                    <div class="relative">
                        <div class="flex flex-col md:flex-row md:items-center gap-6">
                            <div class="w-24 h-24 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white text-5xl shadow-2xl shadow-blue-500/20">
                                <i class="bi bi-bank2"></i>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-3 mb-5">
                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-black uppercase border border-green-200">
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ $scholarship->status }}
                                    </span>
                                    <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-black uppercase border border-blue-200">
                                        <i class="bi bi-award-fill"></i>
                                        {{ $scholarship->tipe }}
                                    </span>
                                </div>
                                <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight">
                                    {{ $scholarship->nama_beasiswa }}
                                </h1>
                                <p class="text-gray-500 font-bold text-lg mt-4">
                                    Dipublikasikan pada {{ \Carbon\Carbon::parse($scholarship->tanggal_dibuat)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-100 rounded-[2.5rem] p-8 shadow-[0_25px_80px_rgba(15,23,42,0.08)] space-y-10">
                    <section>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-gray-900">Deskripsi Beasiswa</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">Informasi lengkap mengenai program beasiswa.</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-7">
                            <p class="text-gray-600 leading-relaxed text-lg font-bold">
                                {{ $scholarship->deskripsi }}
                            </p>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-journal-check"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-gray-900">Persyaratan Utama</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">Pastikan kamu memenuhi seluruh syarat berikut.</p>
                            </div>
                        </div>
                        <div class="bg-cyan-50 border border-cyan-100 rounded-[2rem] p-7">
                            <p class="text-gray-700 leading-relaxed text-lg italic font-bold">
                                "{{ $scholarship->syarat }}"
                            </p>
                        </div>
                    </section>

                    <section>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-gray-900">Benefit & Cakupan</h3>
                                <p class="text-gray-500 font-bold text-sm mt-1">Keuntungan yang akan didapatkan penerima.</p>
                            </div>
                        </div>
                        <div class="bg-orange-50 border border-orange-100 rounded-[2rem] p-7">
                            <p class="text-gray-700 leading-relaxed text-lg font-bold">
                                {{ $scholarship->benefit }}
                            </p>
                        </div>
                    </section>
                </div>
            </div>

            <aside class="space-y-6 relative z-10">
                <div class="sticky top-28 bg-white border border-gray-100 rounded-[2.5rem] p-8 shadow-[0_25px_80px_rgba(15,23,42,0.08)] overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                    
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-2xl text-gray-900">Informasi</h4>
                            <p class="text-gray-500 font-bold text-sm mt-1">Detail pendaftaran beasiswa.</p>
                        </div>
                    </div>

                    <div class="space-y-5 mb-10">
                        <div class="flex items-center justify-between bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4">
                            <div class="flex items-center gap-3 text-gray-500 font-bold">
                                <div class="w-10 h-10 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                                    <i class="bi bi-calendar-event-fill"></i>
                                </div>
                                Deadline
                            </div>
                            <span class="font-black text-red-500 text-right">
                                {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d F Y') }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4">
                            <div class="flex items-center gap-3 text-gray-500 font-bold">
                                <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                Dibuat
                            </div>
                            <span class="font-black text-gray-900 text-right">
                                {{ \Carbon\Carbon::parse($scholarship->tanggal_dibuat)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ route('applications.create') }}" class="w-full inline-flex items-center justify-center gap-3 py-5 bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 hover:scale-[1.02] transition duration-300 rounded-2xl text-white font-black text-lg shadow-[0_15px_50px_rgba(59,130,246,0.3)]">
                        <i class="bi bi-send-fill"></i>
                        Daftar Sekarang
                    </a>

                    <p class="text-center text-xs text-gray-400 mt-5 leading-relaxed font-bold px-2">
                        Pastikan kualifikasi Anda sesuai dengan syarat sebelum melakukan pendaftaran.
                    </p>
                </div>

                <div class="bg-white border border-gray-100 rounded-[2rem] p-6 shadow-xl">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl">
                            <i class="bi bi-buildings-fill"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-lg text-gray-900">Tentang Penyelenggara</h4>
                            <p class="text-gray-500 font-bold text-sm">Informasi provider beasiswa.</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                        <p class="text-sm text-gray-600 leading-relaxed font-bold">
                            Provider ID: <span class="text-blue-600 font-black">#{{ $scholarship->id_provider }}</span>. Informasi lebih lanjut mengenai instansi dapat dilihat melalui profil provider.
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
