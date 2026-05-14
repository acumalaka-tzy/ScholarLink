@extends('provider.provider')

@section('content')

<div class="mb-10 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold text-white mb-2">
            Scholarship List
        </h1>
        <p class="text-slate-400">
            Kelola data beasiswa yang Anda sediakan
        </p>
    </div>
    
    <a href="{{ route('provider.scholarships.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-2xl font-semibold shadow-lg text-white text-sm transition-all">
        + Tambah Beasiswa
    </a>
</div>

@if(session('success'))
    <div class="bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 px-5 py-3 rounded-2xl mb-6 text-sm">
        {{ session('success') }}
    </div>
@endif

<div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-slate-800 text-slate-400 font-semibold text-sm">
                <th class="pb-4 px-4">Nama Beasiswa</th>
                <th class="pb-4 px-4">Deskripsi</th>
                <th class="pb-4 px-4">Deadline</th>
                <th class="pb-4 px-4">Status</th>
                <th class="pb-4 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-slate-300 divide-y divide-slate-800/50">
            @forelse($scholarships as $s)
                <tr class="hover:bg-slate-950/30 transition-colors">
                    <td class="py-4 px-4 font-bold text-white text-lg">
                        {{ $s->nama_beasiswa }}
                    </td>
                    <td class="py-4 px-4 text-sm text-slate-400 max-w-xs truncate">
                        {{ Str::limit($s->deskripsi, 50) }}
                    </td>
                    <td class="py-4 px-4 text-sm">
                        {{ \Carbon\Carbon::parse($s->deadline)->format('d M Y') }}
                    </td>
                    <td class="py-4 px-4 text-sm">
                        <span class="inline-block bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs px-3 py-1 rounded-full font-medium">
                            {{ $s->status }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center text-sm">
                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('provider.scholarships.edit', $s->id_beasiswa) }}" 
                               class="text-amber-400 hover:text-amber-300 font-medium transition-colors">
                                Edit
                            </a>
                            
                            <form action="{{ route('provider.scholarships.destroy', $s->id_beasiswa) }}" 
                                  method="POST" 
                                  class="inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus beasiswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-rose-500 hover:text-rose-400 font-medium transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-10 text-slate-500 text-sm">
                        Belum ada data beasiswa yang dibuat.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection