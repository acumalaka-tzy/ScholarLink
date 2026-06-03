<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get user's applications with scholarships
        $applications = Application::where('id_user', $user->id)
            ->with(['scholarship' => function ($query) {
                $query->with('provider');
            }])
            ->orderByDesc('tanggal_apply')
            ->take(5)
            ->get();
        
        // Get recommended scholarships for the user
        $recommendedScholarships = Scholarship::with('provider')
            ->where('status', 'aktif')
            ->orderByDesc('tanggal_dibuat')
            ->take(3)
            ->get();
        
        return view('dashboard', compact('applications', 'recommendedScholarships'));
    }
}
