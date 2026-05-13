@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold text-white mb-8">
        ❤️ Favorite Beasiswa
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @foreach($favorites as $favorite)

            <div class="bg-white rounded-2xl p-6 shadow-lg">

                <h2 class="text-2xl font-bold mb-3">

                    {{ $favorite->scholarship->nama_beasiswa }}

                </h2>

                <p class="text-gray-700">

                    {{ $favorite->scholarship->deskripsi }}

                </p>

            </div>

        @endforeach

    </div>

</div>

@endsection