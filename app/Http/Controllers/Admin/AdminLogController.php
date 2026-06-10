<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    public function index()
    {
        $logs = AdminLog::with('admin')->orderByDesc('waktu')->get();
        
        return view('admin.logs.index', compact('logs'));
    }
}
