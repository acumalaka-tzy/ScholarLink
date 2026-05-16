@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-10 max-w-3xl">

    <div class="bg-white text-black rounded-2xl shadow-2xl p-8">

        <h1 class="text-3xl font-bold mb-8">
            Tambah Beasiswa
        </h1>

        <form action="{{ route('provider.scholarships.store') }}" method="POST">

            @csrf

            {{-- Nama Beasiswa --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Nama Beasiswa
                </label>

                <input type="text"
                       name="nama_beasiswa"
                       value="{{ old('nama_beasiswa') }}"
                       class="w-full border rounded-xl px-4 py-3">

                @error('nama_beasiswa')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Deskripsi --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          rows="4"
                          class="w-full border rounded-xl px-4 py-3">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Provider --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Provider
                </label>

                <select name="provider_id"
                        class="w-full border rounded-xl px-4 py-3">

                    @foreach($providers as $provider)

                        <option value="{{ $provider->id_provider }}">

                            {{ $provider->nama_instansi }}

                        </option>

                    @endforeach

                </select>

                @error('provider_id')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Kategori --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Kategori
                </label>

                <select name="category_id"
                        class="w-full border rounded-xl px-4 py-3">

                    @foreach($categories as $category)

                        <option value="{{ $category->id_kategori }}">

                            {{ $category->nama_kategori }}

                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Deadline --}}
            <div class="mb-8">

                <label class="block mb-2 font-semibold">
                    Deadline
                </label>

                <input type="date"
                       name="deadline"
                       value="{{ old('deadline') }}"
                       class="w-full border rounded-xl px-4 py-3">

                @error('deadline')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">

                Simpan Beasiswa

            </button>

        </form>

    </div>

</div>

@endsection