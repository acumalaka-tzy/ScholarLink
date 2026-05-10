<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index() {
        $scholarships = Scholarship::all();
        return view('scholarship.index', compact('scholarships')); // Mengarah ke folder beasiswa
    }

    public function show($id) {
        $scholarship = \App\Models\Scholarship::findOrFail($id);
        return view('kategori.detail', compact('scholarship')); // Mengarah ke folder kategori
    }
}