@extends('provider.provider')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Provider Dashboard
    </h1>

    <p class="text-slate-400">
        Selamat datang di panel provider ScholarLink
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Total Scholarships --}}
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">

        <h2 class="text-slate-400 text-sm mb-2">
            Total Scholarships
        </h2>

        <p class="text-4xl font-bold text-white">
            {{ $totalScholarships }}
        </p>

    </div>

    {{-- Active Scholarships --}}
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">

        <h2 class="text-slate-400 text-sm mb-2">
            Active Scholarships
        </h2>

        <p class="text-4xl font-bold text-emerald-400">
            {{ $activeScholarships }}
        </p>

    </div>

    {{-- Total Applications --}}
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">

        <h2 class="text-slate-400 text-sm mb-2">
            Total Applications
        </h2>

        <p class="text-4xl font-bold text-indigo-400">
            {{ $totalApplications }}
        </p>

    </div>

</div>

{{-- Recent Applications --}}
<div class="mt-12">

    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-xl">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-2xl font-bold text-white">
                    Recent Applications
                </h2>

                <p class="text-slate-400 text-sm mt-1">
                    Daftar mahasiswa yang baru apply
                </p>

            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="border-b border-slate-700">

                        <th class="pb-4 text-slate-400">
                            Mahasiswa
                        </th>

                        <th class="pb-4 text-slate-400">
                            Scholarship
                        </th>

                        <th class="pb-4 text-slate-400">
                            Status
                        </th>

                        <th class="pb-4 text-slate-400">
                            Tanggal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($applications as $application)

                        <tr class="border-b border-slate-800">

                            <td class="py-4 text-white">
                                {{ $application->user->name ?? '-' }}
                            </td>

                            <td class="py-4 text-white">
                                {{ $application->scholarship->nama_beasiswa ?? '-' }}
                            </td>

                            <td class="py-4">

                                @if($application->status == 'approved')

                                    <span class="bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full text-sm">
                                        Approved
                                    </span>

                                @elseif($application->status == 'rejected')

                                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm">
                                        Rejected
                                    </span>

                                @else

                                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-sm">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td class="py-4 text-slate-400">
                                {{ $application->created_at }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="py-6 text-center text-slate-500">

                                Belum ada application

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection