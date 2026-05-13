@extends('admin.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Dashboard Admin
</h1>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-500">Total Users</h3>
        <p class="text-3xl font-bold mt-2">
            {{ $totalUsers }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-500">Total Providers</h3>
        <p class="text-3xl font-bold mt-2">
            {{ $totalProviders }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-500">Total Scholarships</h3>
        <p class="text-3xl font-bold mt-2">
            {{ $totalScholarships }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-500">Total Applications</h3>
        <p class="text-3xl font-bold mt-2">
            {{ $totalApplications }}
        </p>
    </div>

</div>

<!-- Recent Users -->
<div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-xl font-bold mb-5">
        Recent Users
    </h2>

    <table class="w-full">

        <thead>
            <tr class="border-b">
                <th class="text-left py-3">Name</th>
                <th class="text-left py-3">Email</th>
                <th class="text-left py-3">Role</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($recentUsers as $user)

                <tr class="border-b">

                    <td class="py-3">
                        {{ $user->nama }}
                    </td>

                    <td class="py-3">
                        {{ $user->email }}
                    </td>

                    <td class="py-3">
                        {{ $user->role }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection