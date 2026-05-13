@extends('admin.admin')

@section('content')

<div class="flex items-center justify-between mb-10">

    <div>

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            Manajemen Users
        </h1>

        <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">
            Kelola seluruh pengguna ScholarLink
        </p>

    </div>

    <a href="{{ route('admin.users.create') }}"
       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl shadow-lg font-semibold transition transform hover:scale-105">

        + Tambah User

    </a>

</div>

<!-- Search -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-5 mb-8 border border-gray-100 dark:border-slate-700">

    <input
        type="text"
        id="searchInput"
        placeholder="Cari user..."
        class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-300 dark:border-slate-700 rounded-xl px-5 py-3 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
    >

</div>

<!-- Table -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-slate-700">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50 dark:bg-slate-900">

                <tr>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Nama
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Email
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Role
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Status
                    </th>

                    <th class="text-center px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($users as $user)

                    <tr class="border-t border-gray-100 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/40 transition user-row">

                        <td class="px-6 py-5 user-name text-gray-900 dark:text-white font-medium">
                            {{ $user->nama }}
                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="
                                px-3 py-1 rounded-full text-sm font-semibold

                                @if($user->role == 'admin')
                                    bg-red-100 text-red-600
                                @else
                                    bg-green-100 text-green-600
                                @endif
                            ">

                                {{ ucfirst($user->role) }}

                            </span>

                        </td>

                        <td class="px-6 py-5">

                            <span class="
                                px-3 py-1 rounded-full text-sm font-semibold

                                @if($user->status == 'aktif')
                                    bg-green-100 text-green-600
                                @else
                                    bg-red-100 text-red-600
                                @endif
                            ">

                                {{ ucfirst($user->status) }}

                            </span>

                        </td>

                        <td class="px-6 py-5 text-center">

                            <div class="flex items-center justify-center gap-3">

                                <a href="{{ route('admin.users.edit', ['user' => $user->id_user]) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                    Edit

                                </a>

                                <form action="{{ route('admin.users.destroy', ['user' => $user->id_user]) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus user ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-gray-500 dark:text-gray-400">

                            Tidak ada data user

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

    const searchInput = document.getElementById('searchInput');

    const userRows = document.querySelectorAll('.user-row');

    searchInput.addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase();

        userRows.forEach(row => {

            const userName = row
                .querySelector('.user-name')
                .textContent
                .toLowerCase();

            if (userName.includes(keyword)) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>

@endsection