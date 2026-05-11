<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Menampilkan semua application
    public function index()
    {
        $applications = Application::with([
            'user',
            'scholarship'
        ])->get();

        return view('applications.index', compact('applications'));
    }

    // Form apply scholarship
    public function create()
    {
        $scholarships = Scholarship::all();

        return view('applications.create', compact('scholarships'));
    }

    // Simpan application
    public function store(Request $request)
    {
        $request->validate([
            'id_beasiswa' => 'required'
        ]);

        Application::create([
            'id_user' => auth()->user()->id,
            'id_beasiswa' => $request->id_beasiswa,
            'tanggal_apply' => now(),
            'status' => 'pending',
            'catatan' => null,
        ]);

        return redirect('/applications')
            ->with('success', 'Berhasil apply scholarship');
    }
}