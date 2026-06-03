<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();

        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif,ditutup',
        ]);

        $scholarship->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Status beasiswa berhasil diperbarui.');
    }
}
