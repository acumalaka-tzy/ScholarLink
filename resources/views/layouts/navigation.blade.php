<nav x-data="{ open: false }" class="sticky top-0 z-50 backdrop-blur-2xl bg-white/80 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <div class="flex items-center gap-12">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-4 group">
                        <div class="w-14 h-14 rounded-[1.5rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-2xl shadow-xl shadow-blue-500/20 group-hover:scale-105 transition duration-300">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-2xl font-black text-gray-900 tracking-tight">ScholarLink</h1>
                            <p class="text-xs text-gray-500 font-bold mt-0.5">Scholarship Platform</p>
                        </div>
                    </a>
                </div>

                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' }} px-6 py-3 rounded-2xl font-black transition duration-300">
                        <i class="bi bi-grid-fill mr-2"></i> Dashboard
                    </a>

                    <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' }} px-6 py-3 rounded-2xl font-black transition duration-300">
                        <i class="bi bi-mortarboard-fill mr-2"></i> Scholarships
                    </a>

                    <a href="{{ route('favorites.index') }}" class="{{ request()->routeIs('favorites.*') ? 'bg-gradient-to-r from-pink-500 to-rose-500 text-white shadow-lg shadow-pink-500/20' : 'text-gray-600 hover:text-pink-500 hover:bg-pink-50' }} px-6 py-3 rounded-2xl font-black transition duration-300">
                        <i class="bi bi-heart-fill mr-2"></i> Favorites
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-5">
                <div class="relative">
                    <button @click="open = ! open" class="flex items-center gap-4 bg-white border border-gray-200 hover:border-cyan-400 px-4 py-3 rounded-2xl shadow-lg transition duration-300">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-lg font-black shadow-lg shadow-blue-500/20">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="text-left">
                            <p class="text-gray-900 font-black text-sm leading-tight">{{ Auth::user()->name }}</p>
                            <p class="text-gray-500 text-xs font-bold mt-1">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="text-gray-400 text-sm">
                            <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </div>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-4 w-72 bg-white border border-gray-100 rounded-[2rem] shadow-[0_20px_60px_rgba(15,23,42,0.12)] overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-xl font-black">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="font-black text-gray-900">{{ Auth::user()->name }}</h3>
                                    <p class="text-gray-500 text-sm font-bold mt-1 break-all">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 space-y-2">
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition font-black">
                                <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-red-50 text-gray-700 hover:text-red-600 transition font-black">
                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </div>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="w-14 h-14 rounded-2xl bg-white border border-gray-200 shadow-lg text-gray-700 flex items-center justify-center text-2xl">
                    <i class="bi" :class="open ? 'bi-x-lg' : 'bi-list'"></i>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition class="sm:hidden bg-white border-t border-gray-100">
        <div class="px-4 py-6 space-y-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-blue-50 text-blue-600 font-black">
                <i class="bi bi-grid-fill text-xl"></i> Dashboard
            </a>
            <a href="{{ route('kategori.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition font-black">
                <i class="bi bi-mortarboard-fill text-xl"></i> Scholarships
            </a>
            <a href="{{ route('favorites.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-pink-50 text-gray-700 hover:text-pink-500 transition font-black">
                <i class="bi bi-heart-fill text-xl"></i> Favorites
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-cyan-50 text-gray-700 hover:text-cyan-600 transition font-black">
                <i class="bi bi-person-fill text-xl"></i> Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-red-50 text-gray-700 hover:text-red-600 transition font-black">
                    <i class="bi bi-box-arrow-right text-xl"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>
