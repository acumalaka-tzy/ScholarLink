@extends('admin.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">
        <div>
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-bold text-sm mb-4 border border-orange-200">
                <div class="w-6 h-6 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                Scholarship Management
            </div>

            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-black text-gray-900">Management Beasiswa</h1>
                    <p class="text-gray-500 font-bold mt-2 text-lg">Kelola seluruh data beasiswa ScholarLink.</p>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.scholarships.create') }}" class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white px-7 py-4 rounded-2xl shadow-lg shadow-blue-500/20 font-black transition hover:scale-[1.02] text-center">
            + Tambah Beasiswa
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-3xl p-5">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-500 flex items-center justify-center text-xl">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="text-green-700 font-black">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px]">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700">Nama Beasiswa</th>
                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700">Tipe</th>
                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700">Deadline</th>
                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700">Status</th>
                        <th class="px-6 py-5 text-center text-sm font-black text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($scholarships as $scholarship)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black shadow-md">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                    <div>
                                        <div class="font-black text-gray-900">{{ $scholarship->nama_beasiswa }}</div>
                                        <div class="text-sm text-gray-500 font-bold mt-1">ScholarLink Scholarship</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-xs font-black border border-blue-200">
                                    @if($scholarship->tipe == 'Fully Funded')
                                        <i class="bi bi-award-fill"></i>
                                    @elseif($scholarship->tipe == 'Partial')
                                        <i class="bi bi-cash-stack"></i>
                                    @else
                                        <i class="bi bi-globe-americas"></i>
                                    @endif
                                    {{ $scholarship->tipe }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-2 text-gray-600 font-bold">
                                    <i class="bi bi-calendar-event-fill text-cyan-500"></i>
                                    {{ $scholarship->deadline }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                @if($scholarship->status == 'aktif')
                                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-black border border-green-200">
                                        <i class="bi bi-check-circle-fill"></i> Aktif
                                    </span>
                                @elseif($scholarship->status == 'nonaktif')
                                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-xs font-black border border-yellow-200">
                                        <i class="bi bi-clock-fill"></i> Nonaktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-xs font-black border border-red-200">
                                        <i class="bi bi-x-circle-fill"></i> Tutup
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.scholarships.edit', $scholarship->id_beasiswa) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.scholarships.destroy', $scholarship->id_beasiswa) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus beasiswa ini?')" class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-xl text-sm font-black transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center text-4xl text-gray-400 mb-5">
                                        <i class="bi bi-journal-x"></i>
                                    </div>
                                    <h3 class="text-2xl font-black text-gray-700 mb-2">Belum Ada Beasiswa</h3>
                                    <p class="text-gray-500 font-bold">Data beasiswa belum tersedia saat ini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
