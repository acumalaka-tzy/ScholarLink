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

        $applications = Application::where('id_user', $user->id)
            ->with(['scholarship' => function ($query) {
                $query->with('provider');
            }])
            ->orderByDesc('tanggal_apply')
            ->take(5)
            ->get();
        
        $recommendedScholarships = Scholarship::with('provider')
            ->where('status', 'aktif')
            ->orderByDesc('tanggal_dibuat')
            ->take(3)
            ->get();
        
        return view('dashboard', compact('applications', 'recommendedScholarships'));
    }
}