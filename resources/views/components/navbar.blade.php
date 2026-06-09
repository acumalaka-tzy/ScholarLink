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
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 flex items-center justify-center text-white text-lg font-black">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <span class="hidden sm:inline font-black text-gray-900 text-sm md:text-base">
                        ScholarLink
                    </span>
                </a>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">

                @if($user->role === 'mahasiswa')
                    <a href="{{ route('dashboard') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <i class="bi bi-house-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Home</span><span class="inline xs:hidden">H</span>
                    </a>

                    <a href="{{ route('scholarships.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                        <i class="bi bi-search mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Search</span><span class="inline xs:hidden">S</span>
                    </a>

                    <a href="{{ route('favorites.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition {{ request()->routeIs('favorites.*') ? 'bg-pink-100 text-pink-600' : '' }}">
                        <i class="bi bi-heart-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Favorites</span><span class="inline xs:hidden">F</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                        <i class="bi bi-person-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Profile</span><span class="inline xs:hidden">P</span>
                    </a>
                @endif

                @if($user->role === 'provider')
                    <a href="{{ route('provider.dashboard') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition {{ request()->routeIs('provider.dashboard') ? 'bg-emerald-100 text-emerald-600' : '' }}">
                        <i class="bi bi-house-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Dashboard</span><span class="inline xs:hidden">D</span>
                    </a>

                    <a href="{{ route('provider.scholarships.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('provider.scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                        <i class="bi bi-mortarboard-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Beasiswa</span><span class="inline xs:hidden">B</span>
                    </a>

                    <a href="{{ route('provider.applications.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition {{ request()->routeIs('provider.applications.*') ? 'bg-purple-100 text-purple-600' : '' }}">
                        <i class="bi bi-file-earmark-text-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Applications</span><span class="inline xs:hidden">A</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                        <i class="bi bi-person-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Profile</span><span class="inline xs:hidden">P</span>
                    </a>
                @endif

                @if($user->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 text-purple-600' : '' }}">
                        <i class="bi bi-speedometer2 mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Dashboard</span><span class="inline xs:hidden">D</span>
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <i class="bi bi-people-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Users</span><span class="inline xs:hidden">U</span>
                    </a>

                    <a href="{{ route('admin.providers.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.providers.*') ? 'bg-emerald-100 text-emerald-600' : '' }}">
                        <i class="bi bi-building-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Providers</span><span class="inline xs:hidden">P</span>
                    </a>

                    <a href="{{ route('admin.scholarships.index') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition {{ request()->routeIs('admin.scholarships.*') ? 'bg-cyan-100 text-cyan-600' : '' }}">
                        <i class="bi bi-mortarboard-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Scholarships</span><span class="inline xs:hidden">S</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition {{ request()->routeIs('profile.edit') ? 'bg-orange-100 text-orange-600' : '' }}">
                        <i class="bi bi-person-fill mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Profile</span><span class="inline xs:hidden">P</span>
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm font-bold text-red-600 hover:bg-red-50 transition">
                        <i class="bi bi-box-arrow-right mr-1 hidden sm:inline"></i>
                        <span class="hidden xs:inline">Logout</span><span class="inline xs:hidden">L</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>