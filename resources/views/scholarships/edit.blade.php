@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] py-10 px-4 md:px-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-4xl mx-auto relative z-0">
        <div class="mb-12">
            <div class="inline-flex items-center gap-3 bg-white border border-gray-200 rounded-full px-5 py-3 mb-6 shadow-sm">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 text-white flex items-center justify-center text-sm">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span class="text-gray-700 text-sm font-black tracking-wide">ScholarLink Scholarship Management</span>
            </div>
            <h1 class="text-5xl sm:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                Edit <span class="bg-gradient-to-r from-amber-500 to-orange-500 bg-clip-text text-transparent">Beasiswa</span>
            </h1>
            <p class="text-gray-500 mt-5 text-lg max-w-3xl leading-relaxed font-bold">
                Perbarui data scholarship dengan tampilan modern, profesional, dan pengalaman pengelolaan terbaik.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-[2.5rem] shadow-lg p-8 sm:p-10">
            <form action="{{ route('provider.scholarships.update', $scholarship->id_beasiswa) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-gray-700 font-black mb-3 text-lg">Nama Beasiswa</label>
                    <div class="relative">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"><i class="bi bi-award-fill"></i></div>
                        <input type="text" name="nama_beasiswa" value="{{ old('nama_beasiswa', $scholarship->nama_beasiswa) }}" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-5 text-gray-900 font-bold focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100 transition">
                    </div>
                    @error('nama_beasiswa') <p class="mt-2 text-red-500 font-bold text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-3 text-lg">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold resize-none focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100 transition">{{ old('deskripsi', $scholarship->deskripsi) }}</textarea>
                    @error('deskripsi') <p class="mt-2 text-red-500 font-bold text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Provider</label>
                        <select name="provider_id" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100 transition">
                            @foreach($providers as $provider)
                                <option value="{{ $provider->id_provider }}" {{ $provider->id_provider == $scholarship->provider_id ? 'selected' : '' }}>
                                    {{ $provider->nama_instansi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-black mb-3 text-lg">Kategori</label>
                        <select name="category_id" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100 transition">
                            @foreach($categories as $category)
                                <option value="{{ $category->id_kategori }}" {{ $category->id_kategori == $scholarship->category_id ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-black mb-3 text-lg">Deadline</label>
                    <input type="date" name="deadline" value="{{ old('deadline', $scholarship->deadline) }}" class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-5 py-5 text-gray-900 font-bold focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100 transition">
                    @error('deadline') <p class="mt-2 text-red-500 font-bold text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-amber-500 to-orange-500 hover:scale-[1.02] transition px-8 py-5 rounded-2xl font-black text-white shadow-lg shadow-orange-500/20">
                        <i class="bi bi-save-fill"></i> Update Beasiswa
                    </button>
                    <a href="{{ route('provider.scholarships.index') }}" class="inline-flex items-center justify-center gap-3 bg-gray-100 hover:bg-gray-200 transition px-8 py-5 rounded-2xl font-black text-gray-700">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
