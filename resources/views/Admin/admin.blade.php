<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-slate-900 text-white p-5">

        <h1 class="text-2xl font-bold mb-8">
            ScholarLink
        </h1>

        <ul class="space-y-4">

            <li>
                <a href="/admin/dashboard" class="hover:text-blue-400">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/admin/users" class="hover:text-blue-400">
                    Users
                </a>
            </li>

            <li>
                <a href="/admin/providers" class="hover:text-blue-400">
                    Providers
                </a>
            </li>

            <li>
                <a href="/admin/scholarships" class="hover:text-blue-400">
                    Scholarships
                </a>
            </li>

            <li>
                <a href="/admin/monitoring " class="hover:text-blue-400">
                    Monitoring
                </a>
            </li>

        </ul>

    </aside>

    <!-- Main -->
    <main class="flex-1 p-8">

        @yield('content')

    </main>

</div>

</body>
</html>