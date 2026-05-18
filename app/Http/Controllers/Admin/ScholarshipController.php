<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{

    public function index()
    {
        $scholarships = Scholarship::all();

        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.scholarships.create', compact('categories'));
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'tipe' => 'required|string',
            'deadline' => 'required|date',
            'deskripsi' => 'required',
            'syarat' => 'required',
            'benefit' => 'required',
            'status' => 'required|string',
            'id_kategori' => 'required|exists:categories,id_kategori',
        ]);

        $validated['id_provider'] = auth()->user()->provider->id_provider;

        $validated['tanggal_dibuat'] = now();

        Scholarship::create($validated);

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        return view('admin.scholarships.show', compact('scholarship'));
    }

    public function edit(string $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $categories = Category::all();

        return view('admin.scholarships.edit', compact('scholarship', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $validated = $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
            'tipe' => 'required|string',
            'deadline' => 'required|date',
            'deskripsi' => 'required',
            'syarat' => 'required',
            'benefit' => 'required',
            'status' => 'required|string',
        ]);

        $scholarship->update($validated);

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Scholarship berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $scholarship->delete();

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Scholarship berhasil dihapus.');
    }
}