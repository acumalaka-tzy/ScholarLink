<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::with([
            'provider',
            'category'
        ])->get();

        return view(
            'scholarships.index',
            compact('scholarships')
        );
    }

    public function show($id)
    {
        $scholarship = Scholarship::with([
            'provider',
            'category'
        ])->findOrFail($id);

        return view(
            'scholarships.show',
            compact('scholarship')
        );
    }

    public function create()
    {
        $providers = Provider::all();
        $categories = Category::all();

        return view(
            'scholarships.create',
            compact('providers', 'categories')
        );
    }

    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'nama_beasiswa' => 'required',
            'deskripsi' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required',
            'deadline' => 'required|date',
        ]);

        Scholarship::create($request->all());

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $providers = Provider::all();
        $categories = Category::all();

        return view(
            'scholarships.edit',
            compact(
                'scholarship',
                'providers',
                'categories'
            )
        );
    }

    public function update(Request $request, $id)
    {
        // VALIDATION
        $request->validate([
            'nama_beasiswa' => 'required',
            'deskripsi' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required',
            'deadline' => 'required|date',
        ]);

        $scholarship = Scholarship::findOrFail($id);

        $scholarship->update($request->all());

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $scholarship->delete();

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil dihapus');
    }
}