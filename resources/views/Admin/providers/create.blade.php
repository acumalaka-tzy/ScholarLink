@extends('admin.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Tambah Provider
</h1>

<form action="{{ route('providers.store') }}"
      method="POST">

    @csrf
    @method('POST')

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Nama Instansi
        </label>

        <input type="text"
               name="nama_instansi"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input type="email"
               name="email_kontak"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            No HP
        </label>

        <input type="text"
               name="no_hp"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Website
        </label>

        <input type="text"
               name="website"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Alamat
        </label>

        <textarea
            name="alamat"
            class="w-full border rounded-lg px-4 py-3"></textarea>

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Deskripsi
        </label>

        <textarea
            name="deskripsi_instansi"
            class="w-full border rounded-lg px-4 py-3"></textarea>

    </div>

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Simpan

    </button>

</form>

@endsection