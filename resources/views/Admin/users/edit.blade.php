@extends('admin.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit User
</h1>

<form action="{{ route('users.update', ['user' => $user->id_user]) }}"
      method="POST"
      class="bg-white p-8 rounded-xl shadow">

    @csrf
    @method('PUT')

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Nama
        </label>

        <input type="text"
               name="nama"
               value="{{ $user->nama }}"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input type="email"
               name="email"
               value="{{ $user->email }}"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Password
        </label>

        <input type="password"
               name="password"
               placeholder="Kosongkan jika tidak ingin mengganti password"
               class="w-full border rounded-lg px-4 py-3">

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Status
        </label>

        <select name="status"
                class="w-full border rounded-lg px-4 py-3">

            <option value="active"
                {{ $user->status == 'active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="inactive"
                {{ $user->status == 'inactive' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>
    </div>  

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Alamat
        </label>

        <input type="text"
               name="alamat"
               value="{{ $user->alamat }}"
               placeholder="Masukkan alamat lengkap"
               class="w-full border rounded-lg px-4 py-3">
    </div>

    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Role
        </label>

        <select name="role"
                class="w-full border rounded-lg px-4 py-3">

            <option value="user"
                {{ $user->role == 'user' ? 'selected' : '' }}>
                User
            </option>

            <option value="provider"
                {{ $user->role == 'provider' ? 'selected' : '' }}>
                Provider
            </option>

            <option value="admin"
                {{ $user->role == 'admin' ? 'selected' : '' }}>
                Admin
            </option>

        </select>

    </div>

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        Update

    </button>

</form>

@endsection