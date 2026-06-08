<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-md">
    <div class="px-4 sm:px-6 lg:px-10 py-3 sm:py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:opacity-80 transition">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 flex items-center justify-center text-white text-lg font-black">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <span class="hidden sm:inline font-black text-gray-900 text-sm md:text-base">ScholarLink</span>
                </a>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">
                <a href="{{ route('dashboard') }}" class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : '' }}">
                    <i class="bi bi-house-fill mr-1 hidden sm:inline"></i>
                    <span class="hidden xs:inline">Home</span><span class="inline xs:hidden">H</span>
                </a>

                <a href="{{ route('scholarships.index') }}" class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('scholarships.index') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                    <i class="bi bi-search mr-1 hidden sm:inline"></i>
                    <span class="hidden xs:inline">Search</span><span class="inline xs:hidden">S</span>
                </a>

                <a href="{{ route('favorites.index') }}" class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition {{ request()->routeIs('favorites.*') ? 'bg-pink-100 text-pink-600' : '' }}">
                    <i class="bi bi-heart-fill mr-1 hidden sm:inline"></i>
                    <span class="hidden xs:inline">Favorites</span><span class="inline xs:hidden">F</span>
                </a>

                <a href="{{ route('profile.edit') }}" class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                    <i class="bi bi-person-fill mr-1 hidden sm:inline"></i>
                    <span class="hidden xs:inline">Profile</span><span class="inline xs:hidden">P</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-red-600 hover:bg-red-50 transition">
                        <i class="bi bi-box-arrow-right mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Logout</span><span class="inline xs:hidden">L</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
