@extends('admin.admin')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">
    <div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
            <div class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
                <i class="bi bi-people-fill"></i>
            </div>
            User Management
        </div>

        <div class="flex items-center gap-5">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <div>
                <h1 class="text-4xl font-black text-gray-900">Management Users</h1>
                <p class="text-gray-500 font-bold mt-2 text-lg">Kelola seluruh pengguna ScholarLink dengan mudah.</p>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98]">
        + Tambah User
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 mb-8">
    <div class="relative">
        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
            <i class="bi bi-search"></i>
        </div>
        <input type="text" id="searchInput" placeholder="Cari user..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
    </div>
</div>

<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px]">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Nama</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Email</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Role</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Status</th>
                    <th class="text-center px-6 py-5 text-sm font-black text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition user-row">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                @if($user->profile?->foto_profil)
                                    <img src="{{ Storage::url($user->profile->foto_profil) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-2xl object-cover shadow-md border border-gray-100">
                                @else
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black shadow-md">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="user-name font-black text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500 font-bold mt-1">ScholarLink User</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-gray-600 font-bold">{{ $user->email }}</td>
                        <td class="px-6 py-5">
                            @if($user->role == 'admin')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-xs font-black border border-red-200">
                                    <i class="bi bi-shield-fill-check"></i> Admin
                                </span>
                            @elseif($user->role == 'mahasiswa')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-black border border-green-200">
                                    <i class="bi bi-mortarboard-fill"></i> Mahasiswa
                                </span>
                            @elseif($user->role == 'provider')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-xs font-black border border-blue-200">
                                    <i class="bi bi-buildings-fill"></i> Provider
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-5">

                            @if($user->status == 'aktif')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-black border border-green-200">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Aktif
                                </span>

                            @elseif($user->status == 'pending')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-xs font-black border border-yellow-200">
                                    <i class="bi bi-clock-fill"></i>
                                    Pending
                                </span>

                            @elseif($user->status == 'rejected')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-xs font-black border border-red-200">
                                    <i class="bi bi-x-circle-fill"></i>
                                    Rejected
                                </span>

                            @else
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-xs font-black border border-gray-200">
                                    <i class="bi bi-slash-circle-fill"></i>
                                    Nonaktif
                                </span>
                            @endif

                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus user ini?')" class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center text-4xl text-gray-400 mb-5">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h3 class="text-2xl font-black text-gray-700 mb-2">Belum Ada User</h3>
                                <p class="text-gray-500 font-bold">Data pengguna belum tersedia saat ini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase();
        const userRows = document.querySelectorAll('.user-row');

        userRows.forEach(row => {
            const nameElement = row.querySelector('.user-name');
            if (nameElement) {
                const userName = nameElement.textContent.toLowerCase();
                row.style.display = userName.includes(keyword) ? '' : 'none';
            }
        });
    });
</script>
@endsection
