<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();

        return view('Scholarship.index', compact('scholarships'));
    }
}