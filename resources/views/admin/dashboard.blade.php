@extends('admin.admin')

@section('content')
<div class="mb-10">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
        <div class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
            <i class="bi bi-speedometer2"></i>
        </div>
        Admin Dashboard
    </div>

    <div class="flex items-center gap-5">
        <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
            <i class="bi bi-grid-fill"></i>
        </div>
        <div>
            <h1 class="text-4xl font-black text-gray-900">Dashboard Admin</h1>
            <p class="text-gray-500 font-bold mt-2 text-lg">Selamat datang kembali di panel admin ScholarLink.</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl p-7 hover:scale-[1.02] transition">
        <div class="flex items-center justify-between mb-6">
            <div class="w-16 h-16 rounded-3xl bg-blue-100 text-blue-600 flex items-center justify-center text-3xl">
                <i class="bi bi-people-fill"></i>
            </div>
            <span class="text-sm font-black text-blue-600 bg-blue-50 px-4 py-2 rounded-full">Users</span>
        </div>
        <p class="text-gray-500 font-bold text-sm mb-2">Total Users</p>
        <h2 class="text-5xl font-black text-gray-900">{{ $totalUsers }}</h2>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl p-7 hover:scale-[1.02] transition">
        <div class="flex items-center justify-between mb-6">
            <div class="w-16 h-16 rounded-3xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-3xl">
                <i class="bi bi-buildings-fill"></i>
            </div>
            <span class="text-sm font-black text-cyan-600 bg-cyan-50 px-4 py-2 rounded-full">Providers</span>
        </div>
        <p class="text-gray-500 font-bold text-sm mb-2">Total Providers</p>
        <h2 class="text-5xl font-black text-gray-900">{{ $totalProviders }}</h2>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl p-7 hover:scale-[1.02] transition">
        <div class="flex items-center justify-between mb-6">
            <div class="w-16 h-16 rounded-3xl bg-orange-100 text-orange-600 flex items-center justify-center text-3xl">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <span class="text-sm font-black text-orange-600 bg-orange-50 px-4 py-2 rounded-full">Scholarships</span>
        </div>
        <p class="text-gray-500 font-bold text-sm mb-2">Total Scholarships</p>
        <h2 class="text-5xl font-black text-gray-900">{{ $totalScholarships }}</h2>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl p-7 hover:scale-[1.02] transition">
        <div class="flex items-center justify-between mb-6">
            <div class="w-16 h-16 rounded-3xl bg-green-100 text-green-600 flex items-center justify-center text-3xl">
                <i class="bi bi-file-earmark-check-fill"></i>
            </div>
            <span class="text-sm font-black text-green-600 bg-green-50 px-4 py-2 rounded-full">Applications</span>
        </div>
        <p class="text-gray-500 font-bold text-sm mb-2">Total Applications</p>
        <h2 class="text-5xl font-black text-gray-900">{{ $totalApplications }}</h2>
    </div>
</div>

<div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl overflow-hidden">
    <div class="px-8 py-7 border-b border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-blue-500/20">
                <i class="bi bi-clock-history"></i>
            </div>
            <div>
                <h2 class="text-2xl font-black text-gray-900">Recent Users</h2>
                <p class="text-gray-500 font-bold text-sm mt-1">Pengguna terbaru ScholarLink</p>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[800px]">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">User</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Email</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentUsers as $user)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black shadow-md">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-black text-gray-900">{{ $user->name }}</div>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-20 text-center">
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
@endsection
