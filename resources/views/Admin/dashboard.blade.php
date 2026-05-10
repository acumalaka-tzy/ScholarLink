@extends('admin.admin')

@section('content')

<div class="mb-10">

    <div class="bg-linear-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white shadow-xl">

        <h1 class="text-4xl font-bold mb-2">
            Dashboard Admin
        </h1>

        <p class="text-indigo-100 text-lg">
            Monitor seluruh aktivitas ScholarLink
        </p>

    </div>

</div>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 card-hover border border-gray-100 dark:border-slate-700">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                    Total Users
                </h3>

                <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ $totalUsers }}
                </p>

            </div>

            <div class="bg-indigo-100 dark:bg-indigo-500/20 p-3 rounded-2xl">

        <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8 text-indigo-600 dark:text-indigo-400"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2m8 0H7m8-10a4 4 0 11-8 0 4 4 0 018 0z"/>

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 card-hover border border-gray-100 dark:border-slate-700">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                    Total Providers
                </h3>

                <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ $totalProviders }}
                </p>

            </div>

            <div class="bg-green-100 dark:bg-green-500/20 p-3 rounded-2xl">

        <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8 text-green-600 dark:text-green-400"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 21h18M9 8h1m-1 4h1m4-4h1m-1 4h1M5 21V7l8-4 8 4v14"/>

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 card-hover border border-gray-100 dark:border-slate-700">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                    Total Scholarships
                </h3>

                <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ $totalScholarships }}
                </p>

            </div>

            <div class="bg-blue-100 dark:bg-blue-500/20 p-3 rounded-2xl">

        <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8 text-blue-600 dark:text-blue-400"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

    </svg>

</div>

        </div>

    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 card-hover border border-gray-100 dark:border-slate-700">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">
                    Total Applications
                </h3>

                <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ $totalApplications }}
                </p>

            </div>

            <div class="bg-yellow-100 dark:bg-yellow-500/20 p-3 rounded-2xl">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8 text-yellow-600 dark:text-yellow-400"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

    </svg>

</div>

        </div>

    </div>

</div>

<!-- Recent Users -->
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-slate-700">

    <div class="p-6 border-b border-gray-200 dark:border-slate-700">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Recent Users
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50 dark:bg-slate-900">

                <tr>

                    <th class="text-left px-6 py-4 text-gray-600 dark:text-gray-300 font-semibold">
                        Name
                    </th>

                    <th class="text-left px-6 py-4 text-gray-600 dark:text-gray-300 font-semibold">
                        Email
                    </th>

                    <th class="text-left px-6 py-4 text-gray-600 dark:text-gray-300 font-semibold">
                        Role
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach ($recentUsers as $user)

                    <tr class="border-t border-gray-100 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/40 transition">

                        <td class="px-6 py-4 text-gray-900 dark:text-white font-medium">
                            {{ $user->nama }}
                        </td>

                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="
                                px-3 py-1 rounded-full text-sm font-semibold

                                @if($user->role == 'admin')
                                    bg-red-100 text-red-600
                                @else
                                    bg-green-100 text-green-600
                                @endif
                            ">

                                {{ ucfirst($user->role) }}

                            </span>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection