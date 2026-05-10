@extends('admin.admin')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
        Tambah User
    </h1>

    <p class="text-gray-500 dark:text-gray-400 text-lg">
        Tambahkan pengguna baru ke ScholarLink
    </p>

</div>

@if ($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-5 py-4 rounded-xl mb-6">

        <ul class="list-disc ml-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('users.store') }}"
      method="POST"
      class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-slate-700">

    @csrf

    <div class="mb-6">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">
            Nama
        </label>

        <input type="text"
               name="nama"
               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-5 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">
            Email
        </label>

        <input type="email"
               name="email"
               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-5 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

    </div>

    <div class="mb-6">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">
            Password
        </label>

        <input type="password"
               name="password"
               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-5 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

    </div>

    <div class="mb-8">

        <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">
            Role
        </label>

        <select name="role"
                class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-5 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <option value="user">User</option>
            <option value="admin">Admin</option>

        </select>

    </div>

    <button
        class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg transition transform hover:scale-105">

        Simpan

    </button>

</form>

@endsection