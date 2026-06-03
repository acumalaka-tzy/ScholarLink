@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-6 sm:py-10 px-3 sm:px-6 md:px-10 overflow-hidden relative">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-64 sm:w-96 h-64 sm:h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-0">
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 sm:gap-8 mb-10 sm:mb-14">
            <div>
                <div class="inline-flex items-center gap-2 sm:gap-3 bg-white border border-gray-200 rounded-full px-3 sm:px-5 py-2 sm:py-3 mb-3 sm:mb-6 shadow-sm">
                    <div class="w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xs sm:text-sm">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <span class="text-gray-700 text-xs sm:text-sm font-black tracking-wide">ScholarLink Scholarship Portal</span>
                </div>
                <h1 class="text-2xl sm:text-5xl md:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                    Daftar <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Beasiswa</span>
                </h1>
                <p class="text-gray-500 mt-2 sm:mt-5 text-xs sm:text-lg max-w-3xl leading-relaxed font-bold">
                    Temukan peluang scholarship terbaik untuk masa depan, pendidikan, dan karier impianmu bersama ScholarLink.
                </p>
            </div>

            @auth
                @if(auth()->user()->role == 'provider')
                    <a href="{{ route('provider.scholarships.create') }}" class="group relative inline-flex items-center justify-center gap-2 sm:gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:scale-[1.03] transition duration-300 px-4 sm:px-8 py-2.5 sm:py-5 rounded-lg sm:rounded-2xl font-black text-white shadow-lg shadow-blue-500/20 text-xs sm:text-base">
                        <i class="bi bi-plus-circle-fill text-base sm:text-xl"></i>
                        <span class="hidden xs:inline">Tambah Beasiswa</span><span class="inline xs:hidden">Tambah</span>
                    </a>
                @endif
            @endauth
        </div>

        {{-- Search and Filter Section --}}
        <div class="mb-8 sm:mb-12">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 sm:pl-6 flex items-center pointer-events-none">
                    <i class="bi bi-search text-gray-400 text-lg sm:text-xl"></i>
                </div>
                <input 
                    type="text" 
                    id="scholarshipSearch" 
                    placeholder="Cari beasiswa, provider, atau kategori..." 
                    class="w-full pl-12 sm:pl-16 pr-4 sm:pr-6 py-3 sm:py-4 bg-white border-2 border-gray-200 rounded-lg sm:rounded-2xl font-semibold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition text-sm sm:text-base"
                >
                <div class="absolute inset-y-0 right-0 pr-4 sm:pr-6 flex items-center pointer-events-none">
                    <span class="text-xs sm:text-sm font-black text-gray-400" id="searchResultCount"></span>
                </div>
            </div>
            <p class="text-xs sm:text-sm text-gray-500 mt-2 font-bold">Ketik nama beasiswa, penyedia, atau kategori untuk memfilter hasil pencarian</p>
        </div>

        @if($scholarships->isEmpty())
            <div class="bg-white border border-gray-100 rounded-lg sm:rounded-[2.5rem] shadow-sm p-8 sm:p-16 text-center">
                <div class="w-20 sm:w-24 h-20 sm:h-24 mx-auto rounded-lg sm:rounded-[2rem] bg-gray-100 text-gray-400 flex items-center justify-center text-3xl sm:text-4xl mb-6 sm:mb-8">
                    <i class="bi bi-journal-x"></i>
                </div>
                <h2 class="text-xl sm:text-3xl font-black text-gray-900 mb-2 sm:mb-3">Belum Ada Beasiswa</h2>
                <p class="text-gray-500 font-bold text-xs sm:text-base max-w-md mx-auto">Data scholarship belum tersedia saat ini. Silakan kembali lagi nanti.</p>
            </div>
        @else
            <div id="scholarshipContainer" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                @foreach($scholarships as $item)
                    <div 
                        class="scholarship-card group bg-white border border-gray-100 rounded-lg sm:rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all duration-500 p-5 sm:p-8 flex flex-col"
                        data-name="{{ $item->nama_beasiswa }}"
                        data-provider="{{ $item->provider->nama_instansi ?? '' }}"
                        data-category="{{ $item->category->nama_kategori ?? '' }}"
                        data-description="{{ $item->deskripsi }}"
                    >
                        <div class="flex items-start justify-between gap-3 sm:gap-4 mb-4 sm:mb-6">
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-blue-50 text-blue-700 px-4 py-1.5 rounded-full text-xs font-black border border-blue-100">
                                    {{ $item->category->nama_kategori ?? 'General' }}
                                </span>
                            </div>
                            <div class="w-14 h-14 rounded-2xl bg-gray-50 text-blue-600 flex items-center justify-center text-2xl shadow-inner">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-blue-600 transition">{{ $item->nama_beasiswa }}</h3>
                        <p class="text-gray-500 font-medium mb-8 flex-grow line-clamp-3">{{ $item->deskripsi }}</p>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 text-sm font-bold text-gray-600">
                                <i class="bi bi-building text-blue-500"></i> {{ $item->provider->nama_instansi ?? '-' }}
                            </div>
                            <div class="flex items-center gap-3 text-sm font-bold text-gray-600">
                                <i class="bi bi-calendar-event text-red-500"></i> {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('scholarships.show', $item->id_beasiswa) }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-center py-3 rounded-xl font-black transition">Detail</a>
                            
                            @auth
                                @if(auth()->user()->role == 'mahasiswa')
                                    <form action="{{ route('applications.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_beasiswa" value="{{ $item->id_beasiswa }}">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-black transition">Apply</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- No Results Message --}}
            <div id="noResults" class="hidden bg-white border border-gray-100 rounded-lg sm:rounded-[2.5rem] shadow-sm p-8 sm:p-16 text-center">
                <div class="w-20 sm:w-24 h-20 sm:h-24 mx-auto rounded-lg sm:rounded-[2rem] bg-yellow-100 text-yellow-400 flex items-center justify-center text-3xl sm:text-4xl mb-6 sm:mb-8">
                    <i class="bi bi-search"></i>
                </div>
                <h2 class="text-xl sm:text-3xl font-black text-gray-900 mb-2 sm:mb-3">Beasiswa Tidak Ditemukan</h2>
                <p class="text-gray-500 font-bold text-xs sm:text-base max-w-md mx-auto">Kami tidak menemukan beasiswa yang sesuai dengan pencarian Anda. Coba cari dengan kata kunci lain.</p>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('scholarshipSearch');
    const scholarshipCards = document.querySelectorAll('.scholarship-card');
    const scholarshipContainer = document.getElementById('scholarshipContainer');
    const noResultsDiv = document.getElementById('noResults');
    const searchResultCount = document.getElementById('searchResultCount');

    function filterScholarships() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        scholarshipCards.forEach(card => {
            const name = card.getAttribute('data-name').toLowerCase();
            const provider = card.getAttribute('data-provider').toLowerCase();
            const category = card.getAttribute('data-category').toLowerCase();
            const description = card.getAttribute('data-description').toLowerCase();

            // Check if search term matches any field
            const matches = 
                name.includes(searchTerm) ||
                provider.includes(searchTerm) ||
                category.includes(searchTerm) ||
                description.includes(searchTerm);

            if (searchTerm === '' || matches) {
                card.style.display = '';
                visibleCount++;
                // Add subtle animation
                card.style.animation = 'fadeIn 0.3s ease-in';
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide no results message
        if (visibleCount === 0 && searchTerm !== '') {
            if (scholarshipContainer) scholarshipContainer.style.display = 'none';
            if (noResultsDiv) noResultsDiv.style.display = 'block';
            if (searchResultCount) searchResultCount.textContent = '0 hasil';
        } else {
            if (scholarshipContainer) scholarshipContainer.style.display = 'grid';
            if (noResultsDiv) noResultsDiv.style.display = 'none';
            if (searchResultCount) searchResultCount.textContent = searchTerm === '' ? '' : `${visibleCount} hasil`;
        }
    }

    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterScholarships);
        searchInput.addEventListener('keyup', filterScholarships);
    }

    // Add fade-in animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .scholarship-card {
            animation: fadeIn 0.3s ease-out;
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection
