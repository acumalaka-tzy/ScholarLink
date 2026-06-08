@extends('admin.admin')

@section('content')
<div class="mb-10 flex items-center justify-between flex-wrap gap-4">
    <div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
            <i class="bi bi-pencil-square"></i> Provider Management
        </div>
        <h1 class="text-4xl font-black text-gray-900">Edit Provider</h1>
        <p class="text-gray-500 font-bold mt-3 text-lg">Perbarui data provider ScholarLink.</p>
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

<form action="{{ route('admin.providers.update', ['provider' => $provider->id_provider]) }}" method="POST" class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
    @csrf
    @method('PUT')

    <div class="p-8 md:p-10 border-b border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                <i class="bi bi-building-gear"></i>
            </div>
            <div>
                <h2 class="text-2xl font-black text-gray-900">Informasi Provider</h2>
                <p class="text-gray-500 font-bold mt-1">Edit informasi provider dengan detail terbaru.</p>
            </div>
        </div>
    </div>

    <div class="p-8 md:p-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Nama Instansi</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-buildings-fill"></i>
                    </div>
                    <input type="text" name="nama_instansi" value="{{ old('nama_instansi', $provider->nama_instansi) }}" placeholder="Masukkan nama instansi" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Email</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <input type="email" name="email_kontak" value="{{ old('email_kontak', $provider->email_kontak) }}" placeholder="contoh@email.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">No HP</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $provider->no_hp) }}" placeholder="Masukkan nomor HP" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-black text-gray-700 mb-3">Website</label>
                <div class="relative">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="bi bi-globe"></i>
                    </div>
                    <input type="text" name="website" value="{{ old('website', $provider->website) }}" placeholder="https://website.com" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
                </div>
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-black text-gray-700 mb-3">Alamat</label>
            <textarea name="alamat" rows="4" placeholder="Masukkan alamat lengkap" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition resize-none">{{ old('alamat', $provider->alamat) }}</textarea>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-black text-gray-700 mb-3">Deskripsi</label>
            <textarea name="deskripsi_instansi" rows="5" placeholder="Masukkan deskripsi provider" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition resize-none">{{ old('deskripsi_instansi', $provider->deskripsi_instansi) }}</textarea>
        </div>

        <div class="mt-10 flex flex-wrap gap-4">
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-8 py-4 rounded-2xl font-black shadow-lg shadow-blue-500/20 transition hover:scale-[1.02]">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.providers.index') }}" class="bg-gray-100 hover:bg-gray-200 border border-gray-200 text-gray-700 px-8 py-4 rounded-2xl font-black transition">
                Kembali
            </a>
        </div>
    </div>
</form>
@endsection
