@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-6 lg:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-pink-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="mb-4 sm:mb-8">
            <a href="{{ route('scholarships.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 font-black text-xs sm:text-base transition group">
                <span class="w-8 sm:w-10 h-8 sm:h-10 rounded-lg sm:rounded-xl bg-white group-hover:bg-gray-100 flex items-center justify-center border border-gray-200">
                    <i class="bi bi-arrow-left text-sm sm:text-base"></i>
                </span>
                Kembali ke Beasiswa
            </a>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 sm:gap-6 mb-8 sm:mb-12">
            <div>
                <div class="inline-flex items-center gap-2 sm:gap-3 bg-white border border-gray-200 rounded-full px-3 sm:px-5 py-2 sm:py-3 mb-3 sm:mb-6 shadow-lg">
                    <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-pink-500 to-rose-500 text-white flex items-center justify-center text-xs sm:text-sm">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <span class="text-gray-700 text-xs sm:text-sm font-black tracking-wide">
                        ScholarLink Favorites
                    </span>
                </div>
                <h1 class="text-2xl sm:text-5xl md:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                    Favorite
                    <span class="bg-gradient-to-r from-pink-500 to-rose-500 bg-clip-text text-transparent">
                        Scholarships
                    </span>
                </h1>
                <p class="text-gray-500 mt-2 sm:mt-5 text-xs sm:text-lg max-w-3xl leading-relaxed font-bold">
                    Simpan beasiswa favoritmu dan akses lebih cepat dengan tampilan modern dan pengalaman terbaik.
                </p>
            </div>

            <div class="bg-white border border-gray-100 px-4 sm:px-7 py-4 sm:py-5 rounded-lg sm:rounded-[2rem] shadow-xl">
                <p class="text-gray-500 text-xs sm:text-sm font-bold mb-2">Total Favorite</p>
                <div class="flex items-center gap-3 sm:gap-4">
                    <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-2xl sm:rounded-3xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl sm:text-3xl">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h2 class="text-3xl sm:text-5xl font-black text-gray-900">
                        {{ $favorites->count() }}
                    </h2>
                </div>
            </div>
        </div>

        @if($favorites->count() == 0)
            <div class="relative overflow-hidden bg-white border border-gray-100 rounded-xl sm:rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
                <div class="absolute top-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-pink-100 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-cyan-100 rounded-full blur-3xl opacity-50"></div>
                
                <div class="relative py-12 sm:py-24 px-4 sm:px-8 flex flex-col items-center text-center">
                    <div class="w-40 h-40 rounded-full bg-gradient-to-br from-pink-100 to-rose-100 border border-pink-200 flex items-center justify-center text-pink-500 text-7xl shadow-2xl shadow-pink-500/10 mb-10">
                        <i class="bi bi-heartbreak-fill"></i>
                    </div>
                    <h2 class="text-5xl font-black text-gray-900 mb-5">
                        Belum Ada Favorite
                    </h2>
                    <p class="text-gray-500 text-lg max-w-3xl leading-relaxed mb-12 font-bold">
                        Tambahkan beasiswa favorit untuk memudahkan pencarian nanti dan simpan peluang terbaikmu di ScholarLink.
                    </p>
                    <a href="{{ route('scholarships.index') }}" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400 px-9 py-5 rounded-2xl font-black text-white text-lg shadow-[0_15px_50px_rgba(244,63,94,0.3)] hover:scale-[1.03] transition duration-300">
                        <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                        <span class="relative text-2xl">
                            <i class="bi bi-search"></i>
                        </span>
                        <span class="relative">
                            Cari Beasiswa
                        </span>
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($favorites as $favorite)
                    <div class="group relative overflow-hidden rounded-[2rem] border border-gray-100 bg-white shadow-[0_20px_60px_rgba(15,23,42,0.08)] hover:shadow-[0_25px_70px_rgba(244,63,94,0.15)] hover:-translate-y-2 transition duration-500">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-50/40 via-transparent to-cyan-50/40 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        
                        <div class="relative p-8">
                            <div class="flex items-start justify-between gap-4 mb-6">
                                <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-white text-4xl shadow-xl shadow-pink-500/20">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <button class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-500 flex items-center justify-center text-2xl shadow-lg">
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                            </div>

                            <div class="mb-5">
                                <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-black uppercase tracking-wider border border-blue-200">
                                    <i class="bi bi-tag-fill"></i>
                                    {{ $favorite->scholarship->category->nama_kategori ?? 'No Category' }}
                                </span>
                            </div>

                            <h2 class="text-2xl font-black text-gray-900 leading-snug mb-5">
                                {{ $favorite->scholarship->nama_beasiswa }}
                            </h2>

                            <p class="text-gray-500 leading-relaxed mb-7 line-clamp-4 font-bold">
                                {{ $favorite->scholarship->deskripsi }}
                            </p>

                            <div class="space-y-4 mb-8">
                                <div class="flex items-center justify-between bg-gray-50 rounded-2xl px-5 py-4 border border-gray-100">
                                    <div class="flex items-center gap-3 text-gray-500 font-bold">
                                        <div class="w-10 h-10 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center">
                                            <i class="bi bi-buildings-fill"></i>
                                        </div>
                                        Provider
                                    </div>
                                    <span class="text-gray-900 font-black text-right">
                                        {{ $favorite->scholarship->provider->nama_instansi ?? 'Unknown Provider' }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between bg-gray-50 rounded-2xl px-5 py-4 border border-gray-100">
                                    <div class="flex items-center gap-3 text-gray-500 font-bold">
                                        <div class="w-10 h-10 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                                            <i class="bi bi-calendar-event-fill"></i>
                                        </div>
                                        Deadline
                                    </div>
                                    <span class="text-gray-900 font-black text-right">
                                        {{ \Carbon\Carbon::parse($favorite->scholarship->deadline)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <a href="{{ route('scholarships.show', $favorite->scholarship->id_beasiswa) }}" class="flex-1 inline-flex justify-center items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition text-white py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20">
                                    <i class="bi bi-eye-fill"></i>
                                    Detail
                                </a>

                                <button type="button" onclick="removeFromFavorite({{ $favorite->id_favorite }}, this)" class="w-16 h-16 rounded-2xl bg-red-100 hover:bg-red-200 transition text-red-600 text-2xl border border-red-200 flex items-center justify-center">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
    function removeFromFavorite(favoriteId, button) {
        if (!confirm('Hapus dari favorite?')) return;
        
        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || '');
        formData.append('_method', 'DELETE');
        
        button.disabled = true;
        button.classList.add('opacity-50', 'cursor-not-allowed');
        
        fetch(`/favorites/${favoriteId}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success', 3000);
                
                const card = button.closest('.group');
                if (card) {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.remove();
                        
                        const container = document.querySelector('[class*="grid"]');
                        if (container && container.children.length === 0) {
                            setTimeout(() => location.reload(), 500);
                        }
                    }, 300);
                }
            } else {
                showToast(data.message || 'Error', 'error', 3000);
                button.disabled = false;
                button.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Terjadi kesalahan', 'error', 3000);
            button.disabled = false;
            button.classList.remove('opacity-50', 'cursor-not-allowed');
        });
    }
</script>
@endsection
