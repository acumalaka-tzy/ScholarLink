@extends('provider.provider')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-black text-white mb-2">
        Applications
    </h1>

    <p class="text-slate-400">
        Kelola application mahasiswa untuk scholarship provider
    </p>

</div>

<div class="glass-card rounded-3xl overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[760px]">

            <thead>

                <tr class="border-b border-slate-700 text-left text-slate-300">

                    <th class="p-5">Mahasiswa</th>
                    <th class="p-5">Scholarship</th>
                    <th class="p-5">Status</th>
                    <th class="p-5">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($applications as $application)

                    <tr class="border-b border-slate-800 hover:bg-slate-800/40 transition">

                        <!-- Student -->
                        <td class="p-5">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center font-black">

                                    {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}

                                </div>

                                <div>

                                    <p class="font-semibold text-white">
                                        {{ $application->user->name ?? '-' }}
                                    </p>

                                    <p class="text-sm text-slate-400">
                                        Applicant
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- Scholarship -->
                        <td class="p-5">

                            <span class="font-medium">
                                {{ $application->scholarship->nama_beasiswa ?? '-' }}
                            </span>

                        </td>

                        <!-- Status -->
                        <td class="p-5">

                            @if($application->status == 'pending')

                                <span class="px-4 py-2 rounded-full text-sm font-semibold bg-yellow-500/15 text-yellow-300 border border-yellow-400/20">
                                    Pending
                                </span>

                            @elseif($application->status == 'approved')

                                <span class="px-4 py-2 rounded-full text-sm font-semibold bg-emerald-500/15 text-emerald-300 border border-emerald-400/20">
                                    Approved
                                </span>

                            @elseif($application->status == 'rejected')

                                <span class="px-4 py-2 rounded-full text-sm font-semibold bg-rose-500/15 text-rose-300 border border-rose-400/20">
                                    Rejected
                                </span>

                            @endif

                        </td>

                        <!-- Action -->
                        <td class="p-5">

                            @if($application->status == 'pending')

                                <div class="flex flex-wrap gap-3">

                                    <!-- Approve -->
                                    <form action="{{ route('provider.applications.approve', $application->id_application) }}"
                                          method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="px-5 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 transition font-semibold shadow-lg shadow-emerald-500/20">

                                            Approve

                                        </button>

                                    </form>

                                    <!-- Reject -->
                                    <form action="{{ route('provider.applications.reject', $application->id_application) }}"
                                          method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="px-5 py-2 rounded-xl bg-rose-500 hover:bg-rose-600 transition font-semibold shadow-lg shadow-rose-500/20">

                                            Reject

                                        </button>

                                    </form>

                                </div>

                            @else

                                <span class="text-slate-500 italic">
                                    No Action
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="py-14 text-center">

                            <div class="text-5xl mb-4">📭</div>

                            <p class="font-bold text-lg">
                                Belum ada application masuk
                            </p>

                            <p class="text-slate-400 mt-1">
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