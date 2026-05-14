@extends('admin.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            Management Beasiswa
        </h1>

        <p class="text-gray-500 dark:text-gray-400 mt-2">
            Kelola seluruh data beasiswa ScholarLink
        </p>

    </div>

    <a href="{{ route('admin.scholarships.create') }}"
       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg transition duration-200 hover:scale-105">

        + Tambah Beasiswa

    </a>

</div>

@if(session('success'))

    <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">

        {{ session('success') }}

    </div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-slate-700">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50 dark:bg-slate-900">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 dark:text-gray-300">
                        Nama Beasiswa
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 dark:text-gray-300">
                        Tipe
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 dark:text-gray-300">
                        Deadline
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 dark:text-gray-300">
                        Status
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-bold text-gray-700 dark:text-gray-300">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100 dark:divide-slate-700">

                @forelse($scholarships as $scholarship)

                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/40 transition">

                        <td class="px-6 py-5">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                {{ $scholarship->nama_beasiswa }}
                            </div>

                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">

                            {{ $scholarship->tipe }}

                        </td>

                        <td class="px-6 py-5 text-gray-600 dark:text-gray-300">

                            {{ $scholarship->deadline }}

                        </td>

                        <td class="px-6 py-5">

                            @if($scholarship->status == 'aktif')

                                <span class="bg-emerald-100 text-emerald-700 px-4 py-1 rounded-full text-sm font-semibold">
                                    Aktif
                                </span>

                            @elseif($scholarship->status == 'draft')

                                <span class="bg-amber-100 text-amber-700 px-4 py-1 rounded-full text-sm font-semibold">
                                    Draft
                                </span>

                            @else

                                <span class="bg-rose-100 text-rose-700 px-4 py-1 rounded-full text-sm font-semibold">
                                    Tutup
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex items-center justify-center gap-3">

                                <a href="{{ route('admin.scholarships.edit', $scholarship->id_beasiswa) }}"
                                   class="bg-indigo-100 hover:bg-indigo-200 text-indigo-700 px-4 py-2 rounded-xl text-sm font-semibold transition">

                                    Edit

                                </a>

                                <form action="{{ route('admin.scholarships.destroy', $scholarship->id_beasiswa) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus beasiswa ini?')"
                                        class="bg-rose-100 hover:bg-rose-200 text-rose-700 px-4 py-2 rounded-xl text-sm font-semibold transition">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-gray-500 dark:text-gray-400">

                            Belum ada data beasiswa

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection