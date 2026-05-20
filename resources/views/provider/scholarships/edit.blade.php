@extends('provider.provider')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Edit Scholarship
    </h1>

    <p class="text-slate-400">
        Perbarui data scholarship
    </p>

</div>

<form action="{{ route('provider.scholarships.update', $scholarship->id_beasiswa) }}"
      method="POST"
      class="glass-card rounded-3xl p-8"

    @csrf
    @method('PUT')

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Nama Beasiswa
        </label>

        <input type="text"
               name="nama_beasiswa"
               value="{{ $scholarship->nama_beasiswa }}"
               class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Deskripsi
        </label>

        <textarea name="deskripsi"
                  rows="5"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">{{ $scholarship->deskripsi }}</textarea>

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Syarat
        </label>

        <textarea name="syarat"
                  rows="4"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">{{ $scholarship->syarat }}</textarea>

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold">
            Benefit
        </label>

        <textarea name="benefit"
                  rows="4"
                  class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">{{ $scholarship->benefit }}</textarea>

    </div>

    <div class="mb-8">

        <label class="block mb-2 font-semibold">
            Deadline
        </label>

        <input type="date"
               name="deadline"
               value="{{ $scholarship->deadline }}"
               class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-3 text-white">

    </div>

    <button
        class="bg-indigo-600 hover:bg-indigo-700 px-8 py-3 rounded-2xl font-semibold shadow-lg">

        Update

    </button>

</form>

@endsection