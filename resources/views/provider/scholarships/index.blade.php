@extends('provider.provider')

@section('content')
<div class="min-h-screen bg-[#f4f7f9] px-4 sm:px-6 lg:px-10 py-10 overflow-hidden">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-12">
            <div>
                <div class="inline-flex items-center gap-3 bg-white border border-gray-200 rounded-full px-5 py-3 mb-6 shadow-lg">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-sm">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <span class="text-gray-700 text-sm font-black tracking-wide">ScholarLink Provider Panel</span>
                </div>
                <h1 class="text-5xl sm:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                    Scholarship <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">Management</span>
                </h1>
                <p class="text-gray-500 mt-5 text-lg max-w-3xl leading-relaxed font-bold">
                    Kelola seluruh data scholarship provider dengan tampilan modern, profesional, dan pengalaman terbaik.
                </p>
            </div>
            <a href="{{ route('provider.scholarships.create') }}" class="group relative overflow-hidden inline-flex items-center justify-center gap-3 bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 px-8 py-5 rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(59,130,246,0.3)] hover:scale-[1.03] transition duration-300">
                <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
                <span class="relative flex items-center gap-3"><i class="bi bi-plus-circle-fill text-xl"></i> Tambah Beasiswa</span>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 rounded-3xl p-6 shadow-lg">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <p class="font-black text-green-700 text-lg">Success</p>
                        <p class="text-green-600 font-bold text-sm mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="relative overflow-hidden bg-white border border-gray-100 rounded-[2.5rem] shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-cyan-400 to-orange-400"></div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1100px]">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-8 py-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Scholarship</th>
                            <th class="px-8 py-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Description</th>
                            <th class="px-8 py-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Deadline</th>
                            <th class="px-8 py-6 text-left text-sm font-black uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-8 py-6 text-center text-sm font-black uppercase tracking-wider text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($scholarships as $s)
                            <tr class="border-b border-gray-100 hover:bg-cyan-50/40 transition duration-300">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-5">
                                        <div class="w-16 h-16 rounded-[1.5rem] bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center text-3xl shadow-xl shadow-blue-500/20 flex-shrink-0">
                                            <i class="bi bi-award-fill"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-black text-gray-900 leading-snug">{{ $s->nama_beasiswa }}</h3>
                                            <p class="text-gray-500 font-bold text-sm mt-1">Scholarship Program</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="max-w-md"><p class="text-gray-500 font-bold leading-relaxed line-clamp-3">{{ Str::limit($s->deskripsi, 120) }}</p></div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="inline-flex items-center gap-3 bg-red-50 border border-red-100 rounded-2xl px-5 py-4">
                                        <div class="w-10 h-10 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center"><i class="bi bi-calendar-event-fill"></i></div>
                                        <div>
                                            <p class="text-xs text-red-400 font-black uppercase tracking-wider">Deadline</p>
                                            <p class="text-red-600 font-black">{{ \Carbon\Carbon::parse($s->deadline)->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-green-100 border border-green-200 text-green-700 font-black text-sm">
                                        <i class="bi bi-check-circle-fill"></i> {{ $s->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('provider.scholarships.edit', $s->id_beasiswa) }}" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-amber-400 to-orange-500 hover:scale-[1.03] transition duration-300 px-5 py-4 rounded-2xl font-black text-white shadow-[0_15px_40px_rgba(251,191,36,0.25)]">
                                            <span class="relative flex items-center gap-3"><i class="bi bi-pencil-fill"></i> Edit</span>
                                        </a>
                                        <form action="{{ route('provider.scholarships.destroy', $s->id_beasiswa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus beasiswa ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-red-500 to-rose-500 hover:scale-[1.03] transition duration-300 px-5 py-4 rounded-2xl font-black text-white shadow-[0_15px_40px_rgba(239,68,68,0.25)]">
                                                <span class="relative flex items-center gap-3"><i class="bi bi-trash-fill"></i> Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-24 px-8">
                                    <div class="flex flex-col items-center justify-center text-center">
                                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 border border-gray-200 flex items-center justify-center text-blue-600 text-7xl shadow-2xl shadow-blue-500/10 mb-10">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>
                                        <h2 class="text-5xl font-black text-gray-900 mb-5">No Scholarships Found</h2>
                                        <p class="text-gray-500 text-lg max-w-3xl leading-relaxed font-bold mb-10">Anda belum memiliki data scholarship. Tambahkan scholarship baru untuk mulai membuka peluang bagi mahasiswa.</p>
                                        <a href="{{ route('provider.scholarships.create') }}" class="group relative overflow-hidden inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-cyan-500 to-orange-400 px-8 py-5 rounded-2xl font-black text-white shadow-[0_15px_50px_rgba(59,130,246,0.3)] hover:scale-[1.03] transition duration-300">
                                            <span class="relative flex items-center gap-3"><i class="bi bi-plus-circle-fill"></i> Tambah Scholarship</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
