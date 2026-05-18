@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 py-10 px-4 sm:px-6 lg:px-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">

        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">
                📄 My Applications
            </h1>

            <p class="text-slate-300 text-lg">
                Pantau status pengajuan beasiswa kamu secara realtime.
            </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md border border-white/10 px-5 py-3 rounded-2xl">
            <p class="text-slate-300 text-sm">
                Total Applications
            </p>

            <h2 class="text-3xl font-bold text-white">
                {{ $applications->count() }}
            </h2>
        </div>

    </div>

    {{-- EMPTY STATE --}}
    @if($applications->count() == 0)

        <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl p-14 text-center">

            <div class="text-7xl mb-6">
                📭
            </div>

            <h2 class="text-3xl font-bold text-white mb-3">
                Belum Ada Application
            </h2>

            <p class="text-slate-300 mb-8">
                Kamu belum mengajukan beasiswa apapun.
            </p>

            <a href="{{ route('scholarships.index') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 transition px-7 py-4 rounded-2xl text-white font-semibold shadow-lg">

                🔍 Cari Beasiswa

            </a>

        </div>

    @else

        {{-- GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            @foreach($applications as $application)

                <div class="group relative overflow-hidden bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-7 hover:scale-[1.02] transition duration-300 shadow-2xl">

                    {{-- Glow --}}
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 bg-gradient-to-r from-blue-500/10 to-purple-500/10"></div>

                    {{-- CONTENT --}}
                    <div class="relative z-10">

                        {{-- TITLE --}}
                        <div class="mb-6">

                            <h2 class="text-2xl font-bold text-white mb-2">
                                {{ $application->scholarship->nama_beasiswa }}
                            </h2>

                            <p class="text-slate-300 line-clamp-2">
                                {{ $application->scholarship->deskripsi }}
                            </p>

                        </div>

                        {{-- INFO --}}
                        <div class="space-y-4 mb-6">

                            <div class="flex items-center justify-between">

                                <span class="text-slate-400">
                                    👨‍🎓 Mahasiswa
                                </span>

                                <span class="text-white font-semibold">
                                    {{ $application->user->name }}
                                </span>

                            </div>

                            <div class="flex items-center justify-between">

                                <span class="text-slate-400">
                                    🏢 Provider
                                </span>

                                <span class="text-white font-semibold">
                                    {{ $application->scholarship->provider->nama_instansi ?? '-' }}
                                </span>

                            </div>

                            <div class="flex items-center justify-between">

                                <span class="text-slate-400">
                                    📅 Tanggal Apply
                                </span>

                                <span class="text-white font-semibold">
                                    {{ \Carbon\Carbon::parse($application->tanggal_apply)->format('d M Y') }}
                                </span>

                            </div>

                        </div>

                        {{-- STATUS --}}
                        <div class="mb-7">

                            @if($application->status == 'pending')

                                <span class="inline-flex items-center gap-2 bg-yellow-500/20 text-yellow-300 border border-yellow-400/20 px-4 py-2 rounded-full text-sm font-semibold">

                                    ⏳ Pending

                                </span>

                            @elseif($application->status == 'approved')

                                <span class="inline-flex items-center gap-2 bg-green-500/20 text-green-300 border border-green-400/20 px-4 py-2 rounded-full text-sm font-semibold">

                                    ✅ Approved

                                </span>

                            @elseif($application->status == 'rejected')

                                <span class="inline-flex items-center gap-2 bg-red-500/20 text-red-300 border border-red-400/20 px-4 py-2 rounded-full text-sm font-semibold">

                                    ❌ Rejected

                                </span>

                            @endif

                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex flex-wrap gap-3">

                            <a href="{{ route('scholarships.show', $application->scholarship->id_beasiswa) }}"
                               class="flex-1 min-w-[140px] text-center bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-2xl font-semibold shadow-lg">

                                Detail

                            </a>

                            @if($application->status == 'pending')

                                <form action="{{ route('applications.destroy', $application->id_application) }}"
                                      method="POST"
                                      class="flex-1 min-w-[140px]">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Batalkan application ini?')"
                                            class="w-full bg-red-500 hover:bg-red-600 transition text-white py-3 rounded-2xl font-semibold shadow-lg">

                                        Cancel

                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection