@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-10">

    <div class="flex items-center justify-between mb-10">

        <div>
            <h1 class="text-4xl font-bold text-white">
                🎓 Daftar Beasiswa
            </h1>

            <p class="text-gray-400 mt-2">
                Temukan peluang beasiswa terbaik untuk masa depanmu
            </p>
        </div>

        {{-- Tombol hanya untuk provider --}}
        @auth
            @if(auth()->user()->role == 'provider')

                <a href="{{ route('scholarship.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 transition px-5 py-3 rounded-xl text-white font-semibold shadow-lg">

                    + Tambah Beasiswa

                </a>

            @endif
        @endauth

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($scholarships as $item)

        <div class="bg-white text-black rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">

            <div class="mb-4">

                <h2 class="text-2xl font-bold mb-2">
                    {{ $item->nama_beasiswa }}
                </h2>

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                    {{ $item->category->nama_kategori ?? '-' }}
                </span>

            </div>

            <p class="text-gray-700 mb-5">
                {{ $item->deskripsi }}
            </p>

            <div class="space-y-2 text-sm">

                <p>
                    <span class="font-semibold">
                        🏢 Provider:
                    </span>

                    {{ $item->provider->nama_instansi ?? '-' }}
                </p>

                <p>
                    <span class="font-semibold">
                        📅 Deadline:
                    </span>

                    {{ $item->deadline }}
                </p>

            </div>


            {{-- BUTTON AREA --}}
            <div class="flex flex-wrap gap-3 mt-6">

                {{-- KHUSUS PROVIDER --}}
                @auth

                    @if(auth()->user()->role == 'provider')

                        <a href="{{ route('scholarship.edit', $item->id_beasiswa) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <form
                            action="{{ route('scholarship.destroy', $item->id_beasiswa) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Yakin hapus beasiswa ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    @endif

                @endauth


                {{-- KHUSUS MAHASISWA --}}
                @auth

                    @if(auth()->user()->role == 'mahasiswa')

                        {{-- APPLY --}}
                        <form
                            action="{{ route('applications.store') }}"
                            method="POST">

                            @csrf

                            <input
                                type="hidden"
                                name="id_beasiswa"
                                value="{{ $item->id_beasiswa }}">

                            <button
                                type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">

                                Apply

                            </button>

                        </form>


                        {{-- FAVORITE --}}
                        <form
                            action="{{ route('favorites.store', $item->id_beasiswa) }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg">

                                Favorite

                            </button>

                        </form>

                    @endif

                @endauth

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection