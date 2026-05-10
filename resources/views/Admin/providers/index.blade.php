@extends('admin.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Manajemen Provider
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola seluruh provider ScholarLink
        </p>

    </div>

    <a href="{{ route('providers.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow">

        + Tambah Provider

    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 text-green-700 px-5 py-4 rounded-lg mb-5">

        {{ session('success') }}

    </div>

@endif

<!-- Search -->
<div class="bg-white p-5 rounded-xl shadow mb-6">

    <input
        type="text"
        id="searchInput"
        placeholder="Cari provider..."
        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >

</div>

<!-- Table -->
<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left px-6 py-4">
                    Nama Instansi
                </th>

                <th class="text-left px-6 py-4">
                    Email
                </th>

                <th class="text-left px-6 py-4">
                    No HP
                </th>

                <th class="text-left px-6 py-4">
                    Alamat
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

            @forelse ($providers as $provider)

                <tr class="border-t hover:bg-gray-50 provider-row">

                    <td class="px-6 py-4 provider-name">
                        {{ $provider->nama_instansi }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $provider->email_kontak }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $provider->no_hp }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $provider->alamat }}
                    </td>

                    <td class="px-6 py-4">

                        <span class="
                            px-3 py-1 rounded-full text-sm

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

                    <td class="px-6 py-4">

                        <div class="flex gap-2 justify-center">

                            <!-- Verify -->
                            <form action="{{ route('providers.verify', ['provider' => $provider->id_provider]) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <button
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm">

                                    Verify

                                </button>

                            </form>

                            <!-- Reject -->
                            <form action="{{ route('providers.reject', ['provider' => $provider->id_provider]) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <button
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm">

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
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-8 text-gray-500">

                        Tidak ada data provider

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

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