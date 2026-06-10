@extends('admin.admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-4 mb-2">
        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center text-xl shadow-inner">
            <i class="bi bi-clock-history"></i>
        </div>
        <div>
            <h2 class="text-3xl font-black text-gray-900 tracking-tight">Admin Logs</h2>
            <p class="text-gray-500 font-bold mt-1">Riwayat aktivitas yang dilakukan oleh administrator</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="text-xl font-black text-gray-800">Daftar Aktivitas</h3>
        <span class="bg-indigo-100 text-indigo-700 font-bold px-4 py-1.5 rounded-full text-sm">
            Total: {{ $logs->count() }} Log
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100">
                    <th class="px-6 py-4 text-xs font-black text-gray-500 uppercase tracking-wider">Waktu</th>
                    <th class="px-6 py-4 text-xs font-black text-gray-500 uppercase tracking-wider">Admin</th>
                    <th class="px-6 py-4 text-xs font-black text-gray-500 uppercase tracking-wider">Aktivitas</th>
                    <th class="px-6 py-4 text-xs font-black text-gray-500 uppercase tracking-wider w-1/3">Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($logs as $log)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="text-xs font-bold text-gray-500 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100 flex items-center justify-center gap-1">
                            <i class="bi bi-clock"></i>
                            {{ \Carbon\Carbon::parse($log->waktu)->format('d M Y, H:i:s') }}
                        </div>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            @if($log->admin?->profile?->foto_profil)
                                <img src="{{ asset('storage/' . $log->admin->profile->foto_profil) }}" alt="{{ $log->admin->name }}" class="w-8 h-8 rounded-full object-cover shadow-md border border-gray-100">
                            @else
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-bold text-xs shadow-md">
                                    {{ strtoupper(substr($log->admin->name ?? '?', 0, 1)) }}
                                </div>
                            @endif
                            <span class="font-bold text-gray-900">{{ $log->admin->name ?? 'Unknown' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <span class="font-black text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-xl text-sm">
                            {{ $log->aktivitas }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-sm text-gray-600 font-medium">
                        {{ $log->keterangan }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center text-3xl mb-4">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <p class="font-bold text-lg">Belum ada riwayat aktivitas</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
