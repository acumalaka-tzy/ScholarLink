@extends('admin.admin')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">
    <div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
            <i class="bi bi-buildings-fill"></i> Provider Management
        </div>
        <h1 class="text-4xl font-black text-gray-900">Manajemen Provider</h1>
        <p class="text-gray-500 font-bold mt-3 text-lg">Kelola seluruh provider ScholarLink dengan mudah.</p>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 rounded-3xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-500 flex items-center justify-center text-xl">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="text-green-700 font-black">{{ session('success') }}</div>
        </div>
    </div>
@endif


<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 mb-8">
    <div class="relative">
        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
            <i class="bi bi-search"></i>
        </div>
        <input type="text" id="searchInput" placeholder="Cari provider..." class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl pl-14 pr-5 py-4 font-bold text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 transition">
    </div>
</div>

<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[1000px]">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Nama Instansi</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Email</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">No HP</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Alamat</th>
                    <th class="text-left px-6 py-5 text-sm font-black text-gray-700">Status</th>
                    <th class="text-center px-6 py-5 text-sm font-black text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($providers as $provider)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition provider-row">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black shadow-md">
                                    {{ strtoupper(substr($provider->nama_instansi, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="provider-name font-black text-gray-900">{{ $provider->nama_instansi }}</div>
                                    <div class="text-sm text-gray-500 font-bold mt-1">Provider ScholarLink</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-gray-600 font-bold">{{ $provider->email_kontak }}</td>
                        <td class="px-6 py-5 text-gray-600 font-bold">{{ $provider->no_hp }}</td>
                        <td class="px-6 py-5 text-gray-600 font-bold max-w-xs truncate">{{ $provider->alamat }}</td>
                        <td class="px-6 py-5">
                            @if($provider->user?->status == 'aktif')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-black border border-green-200">
                                    <i class="bi bi-check-circle-fill"></i> Aktif
                                </span>
                            @elseif($provider->user?->status == 'pending')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-xs font-black border border-yellow-200">
                                    <i class="bi bi-clock-fill"></i> Pending
                                </span>
                            @elseif($provider->user?->status == 'rejected')
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-xs font-black border border-red-200">
                                    <i class="bi bi-x-circle-fill"></i> Rejected
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-xs font-black">
                                    <i class="bi bi-question-circle-fill"></i> Tidak Ada User
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-3 flex-wrap">
                                <a href="{{ route('admin.providers.edit', $provider->id_provider) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                    Edit
                                </a>

                                @if($provider->user?->status == 'pending')
                                    <form action="{{ route('admin.providers.approve', $provider->id_provider) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="bg-green-100 hover:bg-green-200 text-green-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                            Setujui
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.providers.reject', $provider->id_provider) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                            Tolak
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.providers.destroy', $provider->id_provider) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus provider ini?')" class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center text-4xl text-gray-400 mb-5">
                                    <i class="bi bi-buildings"></i>
                                </div>
                                <h3 class="text-2xl font-black text-gray-700 mb-2">Belum Ada Provider</h3>
                                <p class="text-gray-500 font-bold">Data provider belum tersedia saat ini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const providerRows = document.querySelectorAll('.provider-row');

    searchInput.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase();

        providerRows.forEach(row => {
            const providerName = row.querySelector('.provider-name').textContent.toLowerCase();
            if (providerName.includes(keyword)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
