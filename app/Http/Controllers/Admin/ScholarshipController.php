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

    public function create()
    {
        return view('admin.scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Scholarship::create($request->all());

        return redirect()->route('admin.scholarships.index')
                         ->with('success', 'Beasiswa berhasil ditambahkan.');
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
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $scholarship->update($request->all());

        return redirect()->route('admin.scholarships.index')
                         ->with('success', 'Beasiswa berhasil diperbarui.');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect()->route('admin.scholarships.index')
                         ->with('success', 'Beasiswa berhasil dihapus.');
    }
}
