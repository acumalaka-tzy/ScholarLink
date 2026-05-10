@extends('admin.admin')

@section('content')

<div class="flex items-center justify-between mb-10">

    <div>

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            Manajemen Provider
        </h1>

        <p class="text-gray-500 dark:text-gray-400 mt-2 text-lg">
            Kelola seluruh provider ScholarLink
        </p>

    </div>

    <a href="{{ route('providers.create') }}"
       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl shadow-lg font-semibold transition transform hover:scale-105">

        + Tambah Provider

    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6">

        {{ session('success') }}

    </div>

@endif

<!-- Search -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-5 mb-8 border border-gray-100 dark:border-slate-700">

    <input
        type="text"
        id="searchInput"
        placeholder="Cari provider..."
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
                        Nama Instansi
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Email
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        No HP
                    </th>

                    <th class="text-left px-6 py-5 text-gray-600 dark:text-gray-300 font-semibold">
                        Alamat
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

                @forelse ($providers as $provider)

                    <tr class="border-t border-gray-100 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/40 transition provider-row">

                        <td class="px-6 py-5 provider-name text-gray-900 dark:text-white font-medium">
                            {{ $provider->nama_instansi }}
                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">
                            {{ $provider->email_kontak }}
                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">
                            {{ $provider->no_hp }}
                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">
                            {{ $provider->alamat }}
                        </td>

                        <td class="px-6 py-5">

                            <span class="
                                px-3 py-1 rounded-full text-sm font-semibold

                                @if($provider->status == 'verified')
                                    bg-green-100 text-green-600

                                @elseif($provider->status == 'pending')
                                    bg-yellow-100 text-yellow-600

                                @else
                                    bg-red-100 text-red-600
                                @endif
                            ">

                                {{ ucfirst($provider->status) }}

                            </span>

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex gap-2 justify-center">

                                <!-- Edit -->
                                <a href="{{ route('providers.edit', ['provider' => $provider->id_provider]) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                    Edit

                                </a>

                                <!-- Verify -->
                                <form action="{{ route('providers.verify', ['provider' => $provider->id_provider]) }}"
                                      method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                        Verify

                                    </button>

                                </form>

                                <!-- Reject -->
                                <form action="{{ route('providers.reject', ['provider' => $provider->id_provider]) }}"
                                      method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                        Reject

                                    </button>

                                </form>

                                <!-- Delete -->
                                <form action="{{ route('providers.destroy', ['provider' => $provider->id_provider]) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus provider ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-semibold transition">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-10 text-gray-500 dark:text-gray-400">

                            Tidak ada data provider

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- Search Script -->
<script>

    const searchInput = document.getElementById('searchInput');

    const providerRows = document.querySelectorAll('.provider-row');

    searchInput.addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase();

        providerRows.forEach(row => {

            const providerName = row
                .querySelector('.provider-name')
                .textContent
                .toLowerCase();

            if (providerName.includes(keyword)) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>

@endsection