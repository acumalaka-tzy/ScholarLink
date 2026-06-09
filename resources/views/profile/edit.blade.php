<x-app-layout>
    @php
        $user = Auth::user();
        $role = $user->role ?? 'user';

        $roleConfig = [
            'mahasiswa' => [
                'title' => 'Student Profile',
                'subtitle' => 'Pencari Beasiswa',
                'icon' => 'bi-mortarboard-fill',
                'cover' => 'from-blue-600 via-cyan-500 to-indigo-600',
                'badge' => 'bg-blue-100 text-blue-700 border-blue-200',
            ],
            'provider' => [
                'title' => 'Provider Profile',
                'subtitle' => 'Penyedia Beasiswa',
                'icon' => 'bi-building-fill',
                'cover' => 'from-emerald-600 via-green-500 to-teal-500',
                'badge' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
            ],
            'admin' => [
                'title' => 'Admin Profile',
                'subtitle' => 'Pengelola Sistem',
                'icon' => 'bi-shield-lock-fill',
                'cover' => 'from-purple-600 via-indigo-600 to-pink-500',
                'badge' => 'bg-purple-100 text-purple-700 border-purple-200',
            ],
        ];

        $config = $roleConfig[$role] ?? $roleConfig['mahasiswa'];
    @endphp

    <div class="min-h-screen bg-[#f4f7f9] pb-12">

        <div class="relative h-72 overflow-hidden">
            @if($user->profile?->foto_sampul)
                <img src="{{ asset('storage/' . $user->profile->foto_sampul) }}"
                     alt="Foto Sampul"
                     class="absolute inset-0 w-full h-full object-cover">
            @else
                <div class="absolute inset-0 bg-gradient-to-br {{ $config['cover'] }}"></div>
            @endif

            <div class="absolute inset-0 bg-black/30"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pt-8 relative z-10">
                <a href="{{ $role === 'provider' ? route('provider.dashboard') : route('dashboard') }}"
                   class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-full font-black transition">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 -mt-24 relative z-10">

            <div class="bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden mb-8">
                <div class="p-6 sm:p-10">
                    <div class="flex flex-col md:flex-row md:items-end gap-6">

                        @if($user->profile?->foto_profil)
                            <img src="{{ asset('storage/' . $user->profile->foto_profil) }}"
                                 alt="Foto Profil"
                                 class="w-36 h-36 rounded-full object-cover border-8 border-white shadow-xl">
                        @else
                            <div class="w-36 h-36 rounded-full bg-gradient-to-br {{ $config['cover'] }} border-8 border-white shadow-xl flex items-center justify-center text-white text-6xl font-black">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif

                        <div class="flex-1">
                            <h1 class="text-3xl sm:text-5xl font-black text-gray-900">
                                {{ $user->name }}
                            </h1>

                            <p class="text-gray-500 font-bold mt-2 break-all">
                                {{ $user->email }}
                            </p>

                            @if($user->profile?->bio)
                                <div class="mt-4 max-w-3xl">
                                    <p class="text-gray-600 font-bold italic leading-relaxed">
                                        "{{ $user->profile->bio }}"
                                    </p>
                                </div>
                            @endif

                            <div class="flex flex-wrap gap-3 mt-5">
                                <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full border font-black {{ $config['badge'] }}">
                                    <i class="bi {{ $config['icon'] }}"></i>
                                    {{ ucfirst($role) }}
                                </span>

                                <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full border font-black bg-green-100 text-green-700 border-green-200">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Active
                                </span>

                                <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full border font-black bg-gray-100 text-gray-700 border-gray-200">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    Bergabung {{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}
                                </span>
                            </div>

                            @if($user->profile)
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                                    @if($user->profile->universitas)
                                        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                            <p class="text-xs text-gray-400 font-black uppercase mb-1">
                                                Universitas
                                            </p>
                                            <p class="text-gray-900 font-black text-sm">
                                                {{ $user->profile->universitas }}
                                            </p>
                                        </div>
                                    @endif

                                    @if($user->profile->nomor_telepon)
                                        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                            <p class="text-xs text-gray-400 font-black uppercase mb-1">
                                                Nomor Telepon
                                            </p>
                                            <p class="text-gray-900 font-black text-sm">
                                                {{ $user->profile->nomor_telepon }}
                                            </p>
                                        </div>
                                    @endif

                                    @if($user->profile->alamat)
                                        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                            <p class="text-xs text-gray-400 font-black uppercase mb-1">
                                                Alamat
                                            </p>
                                            <p class="text-gray-900 font-black text-sm">
                                                {{ $user->profile->alamat }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            @if($role === 'mahasiswa')
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
                    <a href="{{ route('applications.index') }}" class="bg-white rounded-3xl p-6 border border-blue-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-file-earmark-text-fill text-3xl text-blue-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Applications</h3>
                        <p class="text-sm text-gray-500 font-bold">Status pendaftaran beasiswa</p>
                    </a>

                    <a href="{{ route('favorites.index') }}" class="bg-white rounded-3xl p-6 border border-pink-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-heart-fill text-3xl text-pink-500"></i>
                        <h3 class="font-black text-gray-900 mt-4">Favorites</h3>
                        <p class="text-sm text-gray-500 font-bold">Beasiswa favorit kamu</p>
                    </a>

                    <a href="{{ route('documents.index') }}" class="bg-white rounded-3xl p-6 border border-purple-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-folder-fill text-3xl text-purple-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Documents</h3>
                        <p class="text-sm text-gray-500 font-bold">Kelola dokumen</p>
                    </a>
                </div>
            @elseif($role === 'provider')
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
                    <a href="{{ route('provider.scholarships.index') }}" class="bg-white rounded-3xl p-6 border border-emerald-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-mortarboard-fill text-3xl text-emerald-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Beasiswa Saya</h3>
                        <p class="text-sm text-gray-500 font-bold">Kelola program beasiswa</p>
                    </a>

                    <a href="{{ route('provider.applications.index') }}" class="bg-white rounded-3xl p-6 border border-cyan-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-people-fill text-3xl text-cyan-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Applications</h3>
                        <p class="text-sm text-gray-500 font-bold">Lihat pelamar</p>
                    </a>

                    <a href="{{ route('provider.dashboard') }}" class="bg-white rounded-3xl p-6 border border-teal-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-speedometer2 text-3xl text-teal-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Dashboard</h3>
                        <p class="text-sm text-gray-500 font-bold">Ringkasan provider</p>
                    </a>
                </div>
            @elseif($role === 'admin')
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
                    <a href="{{ route('admin.users.index') }}" class="bg-white rounded-3xl p-6 border border-purple-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-people-fill text-3xl text-purple-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Users</h3>
                        <p class="text-sm text-gray-500 font-bold">Kelola pengguna</p>
                    </a>

                    <a href="{{ route('admin.providers.index') }}" class="bg-white rounded-3xl p-6 border border-indigo-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-building-fill text-3xl text-indigo-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Providers</h3>
                        <p class="text-sm text-gray-500 font-bold">Verifikasi provider</p>
                    </a>

                    <a href="{{ route('admin.scholarships.index') }}" class="bg-white rounded-3xl p-6 border border-blue-100 shadow-sm hover:shadow-xl transition">
                        <i class="bi bi-journals text-3xl text-blue-600"></i>
                        <h3 class="font-black text-gray-900 mt-4">Scholarships</h3>
                        <p class="text-sm text-gray-500 font-bold">Review beasiswa</p>
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
                    <div class="h-2 bg-gradient-to-r {{ $config['cover'] }}"></div>
                    <div class="p-6 sm:p-8">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
                        <div class="h-2 bg-gradient-to-r {{ $config['cover'] }}"></div>
                        <div class="p-6 sm:p-8">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-xl border border-red-100 overflow-hidden">
                        <div class="h-2 bg-gradient-to-r from-red-500 via-rose-500 to-orange-400"></div>
                        <div class="p-6 sm:p-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>