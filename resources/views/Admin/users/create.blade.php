@extends('admin.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Tambah User
</h1>

<form action="{{ route('users.store') }}" method="POST"
      class="bg-white p-8 rounded-xl shadow">

    @csrf

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Nama
        </label>

        <input type="text"
               name="nama"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input type="email"
               name="email"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Password
        </label>

        <input type="password"
               name="password"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Role
        </label>

        <select name="role"
                class="w-full border rounded-lg px-4 py-3">

            <option value="user">User</option>
            <option value="provider">Provider</option>
            <option value="admin">Admin</option>

        </select>

    </div>

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Simpan

    </button>

</form>

@endsection