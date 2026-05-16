<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // LIST
    public function index()
    {
        $scholarships = Scholarship::with([
            'provider',
            'category'
        ])->get();

        return view(
            'provider.scholarships.index',
            compact('scholarships')
        );
    }

    // FORM CREATE
    public function create()
    {
        $providers = Provider::all();

        $categories = Category::all();

        return view(
            'provider.scholarships.create',
            compact('providers', 'categories')
        );
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'deskripsi' => 'required',
            'provider_id' => 'required',
            'category_id' => 'required',
            'deadline' => 'required'
        ]);

        Scholarship::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'provider_id' => $request->provider_id,
            'category_id' => $request->category_id,
            'deadline' => $request->deadline,
        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $providers = Provider::all();

        $categories = Category::all();

        return view(
            'provider.scholarships.edit',
            compact(
                'scholarship',
                'providers',
                'categories'
            )
        );
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $scholarship->update([
            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'provider_id' => $request->provider_id,
            'category_id' => $request->category_id,
            'deadline' => $request->deadline,
        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        $scholarship->delete();

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil dihapus');
    }
}