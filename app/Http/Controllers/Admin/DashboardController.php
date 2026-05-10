<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Provider;
use App\Models\Scholarship;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
{
    $totalUsers = User::count();

    $totalProviders = 0;

    $totalScholarships = 0;

    $totalApplications = 0;

    $recentUsers = User::take(5)->get();

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalProviders',
        'totalScholarships',
        'totalApplications',
        'recentUsers'
    ));
}
}