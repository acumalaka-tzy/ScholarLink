<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ScholarLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .gradient-sidebar {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
        }
        
        .stat-card-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
        }
        
        .application-card {
            transition: all 0.3s ease;
            border-left: 4px solid #6366f1;
        }
        
        .application-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #a855f7);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-950 dark:to-slate-900">
    <!-- Navigation -->
    <nav class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-200/50 dark:border-slate-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-lg bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">
                        S
                    </div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ScholarLink</h1>
                </div>
                <div class="flex gap-6 items-center">
                    <span class="text-gray-700 dark:text-gray-300">
                        Halo, <strong>Mahasiswa</strong> 👋
                    </span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 font-medium transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 dark:bg-slate-950 text-white py-12 mt-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-400 text-sm">
            <p>&copy; 2026 ScholarLink. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
