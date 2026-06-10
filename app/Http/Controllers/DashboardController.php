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
            
        $totalScholarships = Scholarship::where('status', 'aktif')->count();
        $totalApplications = Application::where('id_user', $user->id)->count();
        $totalAccepted = Application::where('id_user', $user->id)->where('status', 'approved')->count();
        
        // Menghitung kelengkapan profil (asumsi sederhana)
        $profileCompleteness = 50; // default (nama & email)
        if ($user->hasVerifiedEmail()) $profileCompleteness += 25;
        if (\App\Models\Document::whereHas('application', function($q) use ($user) {
            $q->where('id_user', $user->id);
        })->exists()) {
            $profileCompleteness += 25;
        }
        
        return view('dashboard', compact(
            'applications', 
            'recommendedScholarships',
            'totalScholarships',
            'totalApplications',
            'totalAccepted',
            'profileCompleteness'
        ));
    }
}