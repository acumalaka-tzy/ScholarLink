@extends('admin.admin')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Dashboard Admin
    </h1>

    <p class="text-slate-400">
        Selamat datang kembali di panel admin ScholarLink
    </p>

</div>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg">
        <p class="text-slate-400 text-sm mb-2">
            Total Users
        </p>

        <h2 class="text-4xl font-bold text-white">
            {{ $totalUsers }}
        </h2>
    </div>

    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg">
        <p class="text-slate-400 text-sm mb-2">
            Total Providers
        </p>

        <h2 class="text-4xl font-bold text-white">
            {{ $totalProviders }}
        </h2>
    </div>

    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg">
        <p class="text-slate-400 text-sm mb-2">
            Total Scholarships
        </p>

        <h2 class="text-4xl font-bold text-white">
            {{ $totalScholarships }}
        </h2>
    </div>

    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg">
        <p class="text-slate-400 text-sm mb-2">
            Total Applications
        </p>

        <h2 class="text-4xl font-bold text-white">
            {{ $totalApplications }}
        </h2>
    </div>

</div>

<!-- Recent Users -->
<div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-lg overflow-hidden">

    <div class="px-6 py-5 border-b border-slate-700">

        <h2 class="text-2xl font-bold text-white">
            Recent Users
        </h2>

        <p class="text-slate-400 text-sm mt-1">
            Pengguna terbaru ScholarLink
        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-900">

                <tr>

                    <th class="text-left px-6 py-4 text-slate-300">
                        Name
                    </th>

                    <th class="text-left px-6 py-4 text-slate-300">
                        Email
                    </th>

                    <th class="text-left px-6 py-4 text-slate-300">
                        Role
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($recentUsers as $user)

                    <tr class="border-t border-slate-700 hover:bg-slate-700/40 transition">

                        <td class="px-6 py-4 text-white">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-slate-300">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="
                                px-3 py-1 rounded-full text-xs font-semibold

                                @if($user->role == 'admin')
                                    bg-red-100 text-red-600

                                @elseif($user->role == 'mahasiswa')
                                    bg-emerald-100 text-emerald-600

                                @elseif($user->role == 'provider')
                                    bg-amber-100 text-amber-600
                                @endif
                            ">

                                {{ ucfirst($user->role) }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3"
                            class="text-center py-10 text-slate-400">

                            Belum ada data user

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection