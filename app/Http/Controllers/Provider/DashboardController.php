<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Application;

class DashboardController extends Controller
{
  public function index()
    {
        $providerId = auth()->user()->provider->id_provider;

        $totalScholarships = Scholarship::where(
            'id_provider',
            $providerId
        )->count();

        $activeScholarships = Scholarship::where(
            'id_provider',
            $providerId
        )
        ->where('status', 'aktif') 
        ->count();

        $totalApplications = Application::whereHas(
            'scholarship',
            function ($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            }
        )->count();

        $recentApplications = Application::whereHas(
            'scholarship',
            function ($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            }
        )
        ->with(['user', 'scholarship']) 
        ->latest()
        ->take(5)
        ->get();

        return view('provider.dashboard', compact(
            'totalScholarships',
            'activeScholarships',
            'totalApplications',
            'recentApplications'
        ));
    }
}