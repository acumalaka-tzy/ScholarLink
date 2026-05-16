<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        $providerId = auth()->user()->provider->id_provider;

        // 1. Hitung Total Scholarships
        $totalScholarships = Scholarship::where('id_provider', $providerId)->count();

        // 2. Hitung Active Scholarships
        $activeScholarships = Scholarship::where('id_provider', $providerId)
            ->where('status', 'active')
            ->count();

        // 3. Hitung Total Applications yang masuk ke beasiswa milik provider ini
        $totalApplications = Application::whereHas('scholarship', function($query) use ($providerId) {
            $query->where('id_provider', $providerId);
        })->count();

        // Kirim semua data bersih ke view
        return view('provider.dashboard', compact(
            'totalScholarships', 
            'activeScholarships', 
            'totalApplications'
        ));
    }
}