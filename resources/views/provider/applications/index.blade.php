@extends('provider.provider')

@section('content')

<div class="mb-8">
    <h1 class="text-4xl font-black text-slate-950 mb-2 tracking-tight">
        Applications
    </h1>
    <p class="text-slate-600 font-extrabold text-sm">
        Kelola application mahasiswa untuk scholarship provider
    </p>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-slate-200 shadow-xl bg-white/80 backdrop-blur-md">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-blue-600 via-cyan-500 to-amber-500 text-left text-white font-black tracking-wider text-xs uppercase shadow-md">
                    <th class="p-5 first:rounded-tl-3xl">Mahasiswa</th>
                    <th class="p-5">Scholarship</th>
                    <th class="p-5">Dokumen</th>
                    <th class="p-5">Status</th>
                    <th class="p-5 last:rounded-tr-3xl">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($applications as $application)
                    <tr class="border-b border-slate-100 hover:bg-slate-50/80 transition duration-150">
                        
                        <td class="p-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center font-black text-white shadow-md shadow-blue-500/20">
                                    {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="font-black text-base text-slate-900 tracking-wide">
                                        {{ $application->user->name ?? '-' }}
                                    </p>

                                    <p class="text-xs font-black text-slate-500 mt-0.5 uppercase tracking-wider">
                                        {{ $application->user->email ?? 'Applicant' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="p-5">
                            <span class="font-black text-xs text-blue-700 tracking-wide bg-blue-50 px-3 py-1.5 rounded-xl border border-blue-100 uppercase">
                                {{ $application->scholarship->nama_beasiswa ?? '-' }}
                            </span>
                        </td>

                        <td class="p-5">
                            @php
                                $documentCount = $application->documents->count();
                            @endphp

                            @if($documentCount > 0)
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-purple-50 text-purple-600 border border-purple-200 inline-flex items-center gap-1.5 uppercase">
                                    <i class="bi bi-file-earmark-check-fill"></i>
                                    {{ $documentCount }} Dokumen
                                </span>
                            @else
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-slate-50 text-slate-400 border border-slate-200 inline-flex items-center gap-1.5 uppercase">
                                    <i class="bi bi-file-earmark-x-fill"></i>
                                    Belum Ada
                                </span>
                            @endif
                        </td>

                        <td class="p-5">
                            @if($application->status == 'pending')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-amber-50 text-amber-600 border border-amber-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Pending
                                </span>
                            @elseif($application->status == 'approved')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Approved
                                </span>
                            @elseif($application->status == 'rejected')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-rose-50 text-rose-600 border border-rose-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="p-5">
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('provider.applications.show', $application->id_application) }}"
                                   class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white transition font-black text-xs tracking-wider shadow-lg shadow-blue-500/20 uppercase">
                                    Detail
                                </a>

                                @if($application->status == 'pending')
                                    <form action="{{ route('provider.applications.approve', $application->id_application) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="px-5 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition font-black text-xs tracking-wider shadow-lg shadow-emerald-500/20 uppercase">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('provider.applications.reject', $application->id_application) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="px-5 py-2 rounded-xl bg-rose-500 hover:bg-rose-600 text-white transition font-black text-xs tracking-wider shadow-lg shadow-rose-500/20 uppercase">
                                            Reject
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-14 text-center">
                            <div class="text-5xl mb-4">📭</div>
                            <p class="font-black text-lg text-slate-800">
                                Belum ada application masuk
                            </p>
                            <p class="text-sm font-bold text-slate-500 mt-2">
                                Data pelamar akan muncul jika mahasiswa sudah apply beasiswa.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection