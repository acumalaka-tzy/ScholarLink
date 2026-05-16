@extends('provider.provider')

@section('content')

{{-- SUCCESS MESSAGE --}}
@if(session('success'))

    <div class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 p-4 rounded-2xl mb-6 shadow-lg flex justify-between items-center">

        <span>
            <strong>Success!</strong>
            {{ session('success') }}
        </span>

        <button onclick="this.parentElement.remove()"
                class="text-emerald-300 font-bold text-xl">

            &times;

        </button>

    </div>

@endif

<div class="p-6">

    {{-- PAGE TITLE --}}
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-white mb-2">
            Applications
        </h1>

        <p class="text-slate-400">
            Kelola application mahasiswa untuk scholarship provider
        </p>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-white">

                {{-- TABLE HEADER --}}
                <thead class="bg-slate-800/80 border-b border-slate-700">

                    <tr>

                        <th class="p-5 font-semibold text-slate-300">
                            Mahasiswa
                        </th>

                        <th class="p-5 font-semibold text-slate-300">
                            Scholarship
                        </th>

                        <th class="p-5 font-semibold text-slate-300">
                            Status
                        </th>

                        <th class="p-5 font-semibold text-slate-300">
                            Action
                        </th>

                    </tr>

                </thead>

                {{-- TABLE BODY --}}
                <tbody>

                    @forelse($applications as $application)

                        <tr class="border-b border-slate-800 hover:bg-slate-800/40 transition duration-200">

                            {{-- STUDENT --}}
                            <td class="p-5">

                                <div>

                                    <p class="font-semibold text-white">
                                        {{ $application->user->name ?? '-' }}
                                    </p>

                                    <p class="text-sm text-slate-400">
                                        Applicant
                                    </p>

                                </div>

                            </td>

                            {{-- SCHOLARSHIP --}}
                            <td class="p-5">

                                <span class="font-medium">
                                    {{ $application->scholarship->nama_beasiswa ?? '-' }}
                                </span>

                            </td>

                            {{-- STATUS --}}
                            <td class="p-5">

                                @if($application->status == 'pending')

                                    <span class="bg-yellow-500/20 text-yellow-400 px-4 py-2 rounded-full text-sm font-semibold border border-yellow-500/30">

                                        Pending

                                    </span>

                                @elseif($application->status == 'approved')

                                    <span class="bg-emerald-500/20 text-emerald-400 px-4 py-2 rounded-full text-sm font-semibold border border-emerald-500/30">

                                        Approved

                                    </span>

                                @elseif($application->status == 'rejected')

                                    <span class="bg-red-500/20 text-red-400 px-4 py-2 rounded-full text-sm font-semibold border border-red-500/30">

                                        Rejected

                                    </span>

                                @endif

                            </td>

                            {{-- ACTION --}}
                            <td class="p-5">

                                @if($application->status == 'pending')

                                    <div class="flex flex-wrap gap-3">

                                        {{-- APPROVE --}}
                                        <form action="{{ route('provider.applications.approve', $application->id_application) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="bg-emerald-500 hover:bg-emerald-600 px-5 py-2 rounded-xl text-white text-sm font-semibold transition duration-200 shadow-lg">

                                                Approve

                                            </button>

                                        </form>

                                        {{-- REJECT --}}
                                        <form action="{{ route('provider.applications.reject', $application->id_application) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl text-white text-sm font-semibold transition duration-200 shadow-lg">

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

                        {{-- EMPTY STATE --}}
                        <tr>

                            <td colspan="4"
                                class="text-center py-12 text-slate-500">

                                Belum ada application masuk

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection