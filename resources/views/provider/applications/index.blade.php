@extends('provider.provider')

@section('content')

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md flex justify-between items-center">
        <span>
            <strong>Success!</strong> {{ session('success') }}
        </span>
        <button onclick="this.parentElement.remove()" class="text-white font-bold">&times;</button>
    </div>
@endif

<div class="p-6">

    <h1 class="text-2xl font-bold text-white mb-6">
        Applications
    </h1>

    <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden">

        <table class="w-full text-left text-white">

            <thead class="bg-gray-800">

                <tr>
                    <th class="p-4">Mahasiswa</th>
                    <th class="p-4">Scholarship</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Action</th>
                </tr>

            </thead>

            <tbody>

                @foreach($applications as $application)

                <tr class="border-b border-gray-700 hover:bg-gray-800 transition">

                    <td class="p-4">
                        {{ $application->user->name }}
                    </td>

                    <td class="p-4">
                        {{ $application->scholarship->nama_beasiswa }}
                    </td>

                    <td class="p-4">

                        @if($application->status == 'pending')

                            <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-semibold">
                                Pending
                            </span>

                        @elseif($application->status == 'approved')

                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Approved
                            </span>

                        @elseif($application->status == 'rejected')

                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        @if($application->status == 'pending')

                            <div class="flex gap-2">

                                <form action="{{ route('provider.applications.approve', $application->id_application) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg text-white text-sm font-medium transition">

                                        Approve

                                    </button>

                                </form>

                                <form action="{{ route('provider.applications.reject', $application->id_application) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white text-sm font-medium transition">

                                        Reject

                                    </button>

                                </form>

                            </div>

                        @else

                            <span class="text-gray-400">
                                No Action
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection