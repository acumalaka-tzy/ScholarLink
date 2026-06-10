<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-md">
    @php
        $user = Auth::user();

        if ($user->role === 'admin') {
            $homeRoute = route('admin.dashboard');
        } elseif ($user->role === 'provider') {
            $homeRoute = route('provider.dashboard');
        } else {
            $homeRoute = route('dashboard');
        }
    @endphp

    <div class="px-4 sm:px-6 lg:px-10 py-3 sm:py-4">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">
                <a href="{{ $homeRoute }}" class="flex items-center gap-2 hover:opacity-80 transition">
                    <div class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center overflow-hidden shadow-sm">
                        <img src="{{ asset('images/logo-scholarlink.png') }}" alt="ScholarLink" class="w-8 h-8 object-contain rounded-full">
                    </div>

                    <span class="hidden sm:inline font-black text-gray-900 text-sm md:text-base">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">

                <!-- Mobile Toggle Button -->
                <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="sm:hidden w-10 h-10 rounded-xl bg-gray-50 border border-gray-200 flex items-center justify-center text-xl text-gray-700 hover:bg-gray-100 transition shadow-sm">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex items-center gap-2 sm:gap-4">

                    @if($user->role === 'mahasiswa')
                        <a href="{{ route('dashboard') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : '' }}">
                            <i class="bi bi-house-fill mr-1"></i>
                            <span>Home</span>
                        </a>

                        <a href="{{ route('scholarships.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                            <i class="bi bi-search mr-1"></i>
                            <span>Search</span>
                        </a>

                        <a href="{{ route('favorites.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition {{ request()->routeIs('favorites.*') ? 'bg-pink-100 text-pink-600' : '' }}">
                            <i class="bi bi-heart-fill mr-1"></i>
                            <span>Favorites</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                            <i class="bi bi-person-fill mr-1"></i>
                            <span>Profile</span>
                        </a>
                    @endif

                    @if($user->role === 'provider')
                        <a href="{{ route('provider.dashboard') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition {{ request()->routeIs('provider.dashboard') ? 'bg-emerald-100 text-emerald-600' : '' }}">
                            <i class="bi bi-house-fill mr-1"></i>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('provider.scholarships.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('provider.scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                            <i class="bi bi-mortarboard-fill mr-1"></i>
                            <span>Beasiswa</span>
                        </a>

                        <a href="{{ route('provider.applications.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition {{ request()->routeIs('provider.applications.*') ? 'bg-purple-100 text-purple-600' : '' }}">
                            <i class="bi bi-file-earmark-text-fill mr-1"></i>
                            <span>Applications</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                            <i class="bi bi-person-fill mr-1"></i>
                            <span>Profile</span>
                        </a>
                    @endif

                    @if($user->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 text-purple-600' : '' }}">
                            <i class="bi bi-speedometer2 mr-1"></i>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            <i class="bi bi-people-fill mr-1"></i>
                            <span>Users</span>
                        </a>

                        <a href="{{ route('admin.providers.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.providers.*') ? 'bg-emerald-100 text-emerald-600' : '' }}">
                            <i class="bi bi-building-fill mr-1"></i>
                            <span>Providers</span>
                        </a>

                        <a href="{{ route('admin.scholarships.index') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('admin.scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                            <i class="bi bi-mortarboard-fill mr-1"></i>
                            <span>Scholarships</span>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                            <i class="bi bi-person-fill mr-1"></i>
                            <span>Profile</span>
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-red-600 hover:bg-red-50 transition">
                            <i class="bi bi-box-arrow-right mr-1"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobileMenu" class="hidden sm:hidden flex-col gap-2 mt-4 pt-4 border-t border-gray-100">
            @if($user->role === 'mahasiswa')
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="bi bi-house-fill text-lg"></i> Home
                </a>
                <a href="{{ route('scholarships.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('scholarships.*') ? 'bg-cyan-50 text-cyan-600' : '' }}">
                    <i class="bi bi-search text-lg"></i> Search
                </a>
                <a href="{{ route('favorites.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-pink-50 hover:text-pink-600 {{ request()->routeIs('favorites.*') ? 'bg-pink-50 text-pink-600' : '' }}">
                    <i class="bi bi-heart-fill text-lg"></i> Favorites
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('profile.edit') ? 'bg-orange-50 text-orange-600' : '' }}">
                    <i class="bi bi-person-fill text-lg"></i> Profile
                </a>
            @endif

            @if($user->role === 'provider')
                <a href="{{ route('provider.dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 {{ request()->routeIs('provider.dashboard') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                    <i class="bi bi-house-fill text-lg"></i> Dashboard
                </a>
                <a href="{{ route('provider.scholarships.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('provider.scholarships.*') ? 'bg-cyan-50 text-cyan-600' : '' }}">
                    <i class="bi bi-mortarboard-fill text-lg"></i> Beasiswa
                </a>
                <a href="{{ route('provider.applications.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 {{ request()->routeIs('provider.applications.*') ? 'bg-purple-50 text-purple-600' : '' }}">
                    <i class="bi bi-file-earmark-text-fill text-lg"></i> Applications
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('profile.edit') ? 'bg-orange-50 text-orange-600' : '' }}">
                    <i class="bi bi-person-fill text-lg"></i> Profile
                </a>
            @endif

            @if($user->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 {{ request()->routeIs('admin.dashboard') ? 'bg-purple-50 text-purple-600' : '' }}">
                    <i class="bi bi-speedometer2 text-lg"></i> Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="bi bi-people-fill text-lg"></i> Users
                </a>
                <a href="{{ route('admin.providers.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 {{ request()->routeIs('admin.providers.*') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                    <i class="bi bi-building-fill text-lg"></i> Providers
                </a>
                <a href="{{ route('admin.scholarships.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('admin.scholarships.*') ? 'bg-cyan-50 text-cyan-600' : '' }}">
                    <i class="bi bi-mortarboard-fill text-lg"></i> Scholarships
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('profile.edit') ? 'bg-orange-50 text-orange-600' : '' }}">
                    <i class="bi bi-person-fill text-lg"></i> Profile
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="w-full flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-bold text-red-600 hover:bg-red-50">
                    <i class="bi bi-box-arrow-right text-lg"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>