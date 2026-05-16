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

    // Total scholarship
    $totalScholarships = Scholarship::where(
        'id_provider',
        $providerId
    )->count();

    // Active scholarship
    $activeScholarships = Scholarship::where(
        'id_provider',
        $providerId
    )
    ->where('status', 'active')
    ->count();

    // Total applications
    $totalApplications = Application::whereHas(
        'scholarship',
        function($query) use ($providerId) {
            $query->where('id_provider', $providerId);
        }
    )->count();

    // Recent applications
    $applications = Application::whereHas(
        'scholarship',
        function($query) use ($providerId) {
            $query->where('id_provider', $providerId);
        }
    )
    ->latest()
    ->take(5)
    ->get();

    return view('provider.dashboard', compact(
        'totalScholarships',
        'activeScholarships',
        'totalApplications',
        'applications'
    ));
}
}