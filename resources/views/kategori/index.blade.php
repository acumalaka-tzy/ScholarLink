@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-10 px-4 md:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <section class="max-w-7xl mx-auto relative z-0">
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8 mb-14">
            <div>
                <div class="inline-flex items-center gap-3 bg-white border border-gray-200 rounded-full px-5 py-3 mb-6 shadow-lg">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-sm">
                        <i class="bi bi-grid-fill"></i>
                    </div>
                    <span class="text-gray-700 text-sm font-black tracking-wide">
                        ScholarLink Scholarship Catalog
                    </span>
                </div>
                <h1 class="text-5xl sm:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                    Katalog
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Beasiswa
                    </span>
                </h1>
                <p class="text-gray-500 mt-5 text-lg max-w-3xl leading-relaxed font-bold">
                    Temukan peluang beasiswa terbaik sesuai minat, kualifikasi, dan masa depan akademikmu.
                </p>
            </div>

            <div class="relative group w-full md:w-[380px]">
                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="bi bi-search"></i>
                </div>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari beasiswa..."
                    class="w-full bg-white border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-5 text-gray-900 font-bold placeholder:text-gray-400 shadow-xl focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition"
                >
            </div>
        </div>

        <div id="scholarshipContainer" class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($scholarships as $item)
                <div class="scholarship-card group relative overflow-hidden bg-white border border-gray-100 rounded-[2rem] p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] hover:shadow-[0_25px_70px_rgba(59,130,246,0.15)] hover:-translate-y-2 transition duration-500">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/40 via-transparent to-cyan-50/40 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    
                    <div class="relative">
                        <div class="flex items-start justify-between gap-5 mb-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap gap-3 mb-5">
                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-black uppercase border border-green-200">
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ $item->status }}
                                    </span>
                                </div>
                                <h2 class="scholarship-title text-2xl font-black text-gray-900 leading-snug group-hover:text-blue-600 transition">
                                    {{ $item->nama_beasiswa }}
                                </h2>
                            </div>
                            <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white text-4xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                        </div>

                        <p class="text-gray-500 leading-relaxed mb-8 line-clamp-3 font-bold">
                            {{ $item->deskripsi }}
                        </p>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between bg-gray-50 rounded-2xl px-5 py-4 border border-gray-100">
                                <div class="flex items-center gap-3 text-gray-500 font-bold">
                                    <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                        <i class="bi bi-award-fill"></i>
                                    </div>
                                    Tipe
                                </div>
                                <span class="text-blue-600 font-black text-right">
                                    {{ $item->tipe }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between bg-gray-50 rounded-2xl px-5 py-4 border border-gray-100">
                                <div class="flex items-center gap-3 text-gray-500 font-bold">
                                    <div class="w-10 h-10 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                                        <i class="bi bi-calendar-event-fill"></i>
                                    </div>
                                    Deadline
                                </div>
                                <span class="text-red-500 font-black text-right">
                                    {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ route('kategori.detail', $item->id_beasiswa) }}" class="group/button relative overflow-hidden block w-full text-center bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 py-5 rounded-2xl font-black text-lg text-white shadow-[0_15px_50px_rgba(59,130,246,0.3)] hover:scale-[1.02] transition duration-300">
                            <span class="absolute inset-0 bg-white/10 opacity-0 group-hover/button:opacity-100 transition"></span>
                            <span class="relative flex items-center justify-center gap-3">
                                <i class="bi bi-eye-fill"></i>
                                Lihat Detail
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const scholarshipCards = document.querySelectorAll('.scholarship-card');

    searchInput.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase();

        scholarshipCards.forEach(card => {
            const title = card.querySelector('.scholarship-title').textContent.toLowerCase();

            if (title.includes(keyword)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
@endsection
