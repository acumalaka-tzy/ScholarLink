@extends('admin.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Manajemen Users
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola seluruh pengguna ScholarLink
        </p>
    </div>

    <a href="{{ route('users.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">

        + Tambah User

    </a>

</div>

<!-- Search -->
<div class="bg-white p-5 rounded-xl shadow mb-6">

    <input
        type="text"
        id="searchInput"
        placeholder="Cari user..."
        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >

</div>

<!-- Table -->
<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left px-6 py-4">
                    Nama
                </th>

                <th class="text-left px-6 py-4">
                    Email
                </th>

                <th class="text-left px-6 py-4">
                    Role
                </th>

                <th class="text-left px-6 py-4">
                    Status
                </th>

                <th class="text-center px-6 py-4">
                    Action
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse ($users as $user)

                <tr class="border-t hover:bg-gray-50 user-row">

                    <td class="px-6 py-4 user-name">
                        {{ $user->nama }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>

                    <td class="px-6 py-4">

                        <span class="
                            px-3 py-1 rounded-full text-sm

                            @if($user->role == 'admin')
                                bg-red-100 text-red-600
                            @elseif($user->role == 'provider')
                                bg-blue-100 text-blue-600
                            @else
                                bg-green-100 text-green-600
                            @endif
                        ">

                            {{ ucfirst($user->role) }}

                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <span class="
                            px-3 py-1 rounded-full text-sm

                            @if($user->status == 'aktif')
                                bg-green-100 text-green-600
                            @else
                                bg-red-100 text-red-600
                            @endif
                        ">

                            {{ ucfirst($user->status) }}

                        </span>

                    </td>

                    <td class="px-6 py-4 text-center">

                        <div class="flex items-center justify-center gap-2">

                            <a href="{{ route('users.edit', ['user' => $user->id_user]) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm">

                                Edit

                            </a>

                            <form action="{{ route('users.destroy', ['user' => $user->id_user]) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-8 text-gray-500">

                        Tidak ada data user

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

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