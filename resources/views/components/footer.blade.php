    <footer class="bg-gradient-to-br from-cyan-100 via-[#d1e9f6] to-cyan-100 text-gray-900 py-12 sm:py-16 border-t border-cyan-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 mb-12">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <img src="{{ asset('images/logo-scholarlink.png') }}" class="w-8 h-8 rounded-full shadow-md object-cover" alt="ScholarLink Logo">
                    <h4 class="font-black text-xl text-gray-900">ScholarLink</h4>
                </div>
                <p class="text-gray-700 text-sm font-bold leading-relaxed">Platform terpercaya dan bersemangat untuk menemukan beasiswa impian Anda.</p>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-4 sm:mb-6 text-base">Navigasi</h4>
                <ul class="text-gray-700 text-sm space-y-2 sm:space-y-3 font-bold">
                    <li><a href="{{ url('/#about') }}" class="hover:text-blue-600 transition">Tentang</a></li>
                    <li><a href="{{ url('/#scholarships') }}" class="hover:text-blue-600 transition">Beasiswa</a></li>
                    <li><a href="{{ url('/#steps') }}" class="hover:text-blue-600 transition">Cara Kerja</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-4 sm:mb-6 text-base">Platform</h4>
                <ul class="text-gray-700 text-sm space-y-2 sm:space-y-3 font-bold">
                    <li>Mahasiswa</li>
                    <li>Provider Beasiswa</li>
                    <li>Manajemen Pendaftaran</li>
                    <li>Pemantauan Status</li>
                </ul>
            </div>
            <div>
                <h4 class="font-black text-gray-900 mb-4 sm:mb-6 text-base">Kontak</h4>
                <ul class="text-gray-700 text-sm space-y-2 sm:space-y-3 font-bold">
                    <li><i class="bi bi-envelope-fill mr-2 text-cyan-600"></i> info@scholarlink.id</li>
                    <li><i class="bi bi-telephone-fill mr-2 text-cyan-600"></i> +62 812-3456-7890</li>
                    <li><i class="bi bi-geo-alt-fill mr-2 text-cyan-600"></i> Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-cyan-200 pt-8 text-center text-gray-600 text-sm font-black">
            &copy; {{ date('Y') }} ScholarLink. Semua hak dilindungi.
        </div>
    </footer>
