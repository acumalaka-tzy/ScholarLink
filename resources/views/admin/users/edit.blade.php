@extends('admin.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
            <div class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
                <i class="bi bi-people-fill"></i>
            </div>
            User Management
        </div>

        <div class="flex items-center gap-5">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                <i class="bi bi-pencil-square"></i>
            </div>
            <div>
                <h1 class="text-4xl font-black text-gray-900">Edit User</h1>
                <p class="text-gray-500 font-bold mt-2 text-lg">Perbarui data pengguna ScholarLink.</p>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-8 bg-red-50 border border-red-200 rounded-3xl p-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-500 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="bi bi-exclamation-circle-fill"></i>
                </div>
                <div>
                    <h4 class="font-black text-red-700 text-lg mb-2">Terjadi Kesalahan</h4>
                    <ul class="space-y-1 text-red-600 font-bold text-sm">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 md:p-10 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-person-vcard-fill"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900">Informasi User</h2>
                    <p class="text-gray-500 font-bold mt-1">Edit informasi pengguna dengan detail terbaru.</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="p-8 md:p-10 space-y-7">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Nama</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Email</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="contoh@email.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Password</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Status</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <select name="status" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                        <option value="pending" {{ old('status', $user->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="rejected" {{ old('status', $user->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Active</option>
                        <option value="nonaktif" {{ old('status', $user->status) == 'nonaktif' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Role</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <select name="role" class="w-full appearance-none bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-12 py-4 font-bold text-gray-900 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                        <option value="mahasiswa" {{ old('role', $user->role) == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="provider" {{ old('role', $user->role) == 'provider' ? 'selected' : '' }}>Provider</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex flex-wrap gap-4">
                <button type="submit" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02] active:scale-[0.98]">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-100 hover:bg-gray-200 border border-gray-200 text-gray-700 px-8 py-4 rounded-2xl font-black transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
