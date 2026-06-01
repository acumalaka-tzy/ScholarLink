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
        <table class="w-full min-w-[760px] border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-blue-600 via-cyan-500 to-amber-500 text-left text-white font-black tracking-wider text-xs uppercase shadow-md">
                    <th class="p-5 first:rounded-tl-3xl">Mahasiswa</th>
                    <th class="p-5">Scholarship</th>
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
                                    <a href="{{ route('provider.applications.show', $application->id_application) }}" class="font-black text-base text-slate-900 hover:text-blue-600 transition duration-200 block tracking-wide">
                                        {{ $application->user->name ?? '-' }}
                                    </a>
                                    <p class="text-xs font-black text-slate-500 mt-0.5 uppercase tracking-wider">
                                        Applicant
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
                            @if($application->status == 'pending')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-amber-50 text-amber-600 border border-amber-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                </span>
                            @elseif($application->status == 'approved')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Approved
                                </span>
                            @elseif($application->status == 'rejected')
                                <span class="px-4 py-2 rounded-full text-xs font-black bg-rose-50 text-rose-600 border border-rose-200 inline-flex items-center gap-1.5 uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Rejected
                                </span>
                            @endif
                        </td>

                        <td class="p-5">
                            @if($application->status == 'pending')
                                <div class="flex flex-wrap gap-3">
                                    <form action="{{ route('provider.applications.approve', $application->id_application) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white transition font-black text-xs tracking-wider shadow-lg shadow-emerald-500/20 uppercase">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('provider.applications.reject', $application->id_application) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-5 py-2 rounded-xl bg-rose-500 hover:bg-rose-600 text-white transition font-black text-xs tracking-wider shadow-lg shadow-rose-500/20 uppercase">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-xs font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-200">
                                    Processed
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-14 text-center">
                            <div class="text-5xl mb-4">📭</div>
                            <p class="font-black text-lg text-slate-800">
                                Belum ada application masuk
                            </p>
                            <p class="text-slate-500 mt-1 font-bold text-sm">
                                Application mahasiswa akan muncul di sini.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection