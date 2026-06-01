@extends('provider.provider')

@section('content')

<div class="mb-8">
    <h1 class="text-4xl font-black text-gray-900 mb-2">
        Detail Application
    </h1>

<p class="text-gray-500">
    Informasi lengkap mahasiswa pendaftar scholarship
</p>

</div>

<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

<!-- Header -->
<div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-8">

    <div class="flex items-center gap-5">

        <div class="w-20 h-20 rounded-[1.5rem] bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center text-white text-3xl font-black">
            {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}
        </div>

        <div>
            <h2 class="text-3xl font-black text-white">
                {{ $application->user->name ?? '-' }}
            </h2>

            <p class="text-white/80 mt-1">
                Applicant Scholarship
            </p>
        </div>

    </div>

</div>

<!-- Content -->
<div class="p-8">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="text-sm font-bold text-gray-500">
                Nama Mahasiswa
            </label>

            <div class="mt-2 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                {{ $application->user->name ?? '-' }}
            </div>
        </div>

        <div>
            <label class="text-sm font-bold text-gray-500">
                Email
            </label>

            <div class="mt-2 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                {{ $application->user->email ?? '-' }}
            </div>
        </div>

        <div>
            <label class="text-sm font-bold text-gray-500">
                Scholarship
            </label>

            <div class="mt-2 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                {{ $application->scholarship->nama_beasiswa ?? '-' }}
            </div>
        </div>

        <div>
            <label class="text-sm font-bold text-gray-500">
                Status
            </label>

            <div class="mt-2">

                @if($application->status == 'pending')

                    <span class="px-4 py-2 rounded-full text-sm font-semibold bg-yellow-500/15 text-yellow-600 border border-yellow-400/20">
                        Pending
                    </span>

                @elseif($application->status == 'approved')

                    <span class="px-4 py-2 rounded-full text-sm font-semibold bg-emerald-500/15 text-emerald-600 border border-emerald-400/20">
                        Approved
                    </span>

                @elseif($application->status == 'rejected')

                    <span class="px-4 py-2 rounded-full text-sm font-semibold bg-rose-500/15 text-rose-600 border border-rose-400/20">
                        Rejected
                    </span>

                @endif

            </div>
        </div>

    </div>

    <!-- Buttons -->
    <div class="mt-10 flex flex-wrap gap-4">

        <a href="{{ route('provider.applications.index') }}"
           class="px-6 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-105 transition">

            <i class="bi bi-arrow-left mr-2"></i>
            Kembali

        </a>

        @if($application->status == 'pending')

            <form action="{{ route('provider.applications.approve', $application->id_application) }}"
                  method="POST">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-600 text-white font-black shadow-lg shadow-emerald-500/20 transition">

                    <i class="bi bi-check-circle-fill mr-2"></i>
                    Approve

                </button>

            </form>

            <form action="{{ route('provider.applications.reject', $application->id_application) }}"
                  method="POST">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-rose-500 hover:bg-rose-600 text-white font-black shadow-lg shadow-rose-500/20 transition">

                    <i class="bi bi-x-circle-fill mr-2"></i>
                    Reject

                </button>

            </form>

        @endif

    </div>

</div>

</div>

@endsection
