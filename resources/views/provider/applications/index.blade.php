@extends('provider.provider')

@section('content')

<div class="mb-8">
    <h1 class="text-4xl font-black text-gray-900 mb-2">
        Applications
    </h1>

<p class="text-gray-500">
    Kelola application mahasiswa untuk scholarship provider
</p>

</div>

<div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

<div class="overflow-x-auto">

    <table class="w-full min-w-[800px]">

        <thead class="bg-gray-50 border-b border-gray-100">

            <tr class="text-left">

                <th class="p-6 text-gray-500 font-black">
                    Mahasiswa
                </th>

                <th class="p-6 text-gray-500 font-black">
                    Scholarship
                </th>

                <th class="p-6 text-gray-500 font-black">
                    Status
                </th>

                <th class="p-6 text-gray-500 font-black">
                    Action
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($applications as $application)

                <tr class="border-b border-gray-100 hover:bg-blue-50/40 transition">

                    <!-- Student -->
                    <td class="p-6">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex items-center justify-center font-black shadow-lg shadow-blue-500/20">

                                {{ strtoupper(substr($application->user->name ?? 'M', 0, 1)) }}

                            </div>

                            <div>

                                <p class="font-black text-gray-900">
                                    {{ $application->user->name ?? '-' }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Applicant
                                </p>

                            </div>

                        </div>

                    </td>

                    <!-- Scholarship -->
                    <td class="p-6">

                        <span class="font-semibold text-gray-800">
                            {{ $application->scholarship->nama_beasiswa ?? '-' }}
                        </span>

                    </td>

                    <!-- Status -->
                    <td class="p-6">

                        @if($application->status == 'pending')

                            <span class="px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-700 border border-yellow-200">
                                Pending
                            </span>

                        @elseif($application->status == 'approved')

                            <span class="px-4 py-2 rounded-full text-sm font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">
                                Approved
                            </span>

                        @elseif($application->status == 'rejected')

                            <span class="px-4 py-2 rounded-full text-sm font-bold bg-rose-100 text-rose-700 border border-rose-200">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <!-- Action -->
                    <td class="p-6">

                        <div class="flex flex-wrap gap-3">

                            <a href="{{ route('provider.applications.show', $application->id_application) }}"
                               class="px-5 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold shadow-lg shadow-blue-500/20 hover:scale-105 transition">

                                Detail

                            </a>

                            @if($application->status == 'pending')

                                <form action="{{ route('provider.applications.approve', $application->id_application) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="px-5 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-500/20 transition">

                                        Approve

                                    </button>

                                </form>

                                <form action="{{ route('provider.applications.reject', $application->id_application) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="px-5 py-2 rounded-xl bg-rose-500 hover:bg-rose-600 text-white font-bold shadow-lg shadow-rose-500/20 transition">

                                        Reject

                                    </button>

                                </form>

                            @endif

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="py-20 text-center">

                        <div class="text-6xl mb-4">
                            📭
                        </div>

                        <h3 class="text-2xl font-black text-gray-800">
                            Belum Ada Application
                        </h3>

                        <p class="text-gray-500 mt-2">
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
