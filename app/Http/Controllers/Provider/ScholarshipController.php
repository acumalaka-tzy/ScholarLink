<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scholarship;
use App\Models\Category;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::where(
            'id_provider',
            auth()->user()->provider->id_provider
        )->get();

        return view(
            'provider.scholarships.index',
            compact('scholarships')
        );
    }

    public function create()
    {
        $categories = Category::all();

        return view('provider.scholarships.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Scholarship::create([

            'id_provider' =>
                auth()->user()->provider->id_provider,

            'id_kategori' => $request->id_kategori,

            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'required_documents' => array_values(array_filter($request->input('required_documents', []))),
            'benefit' => $request->benefit,
            'tipe' => $request->tipe,
            'deadline' => $request->deadline,
            'tanggal_dibuat' => now(),
            'status' => 'aktif',

        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil dibuat');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::where(
            'id_provider',
            auth()->user()->provider->id_provider
        )->findOrFail($id);

        return view(
            'provider.scholarships.edit',
            compact('scholarship')
        );
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::where(
            'id_provider',
            auth()->user()->provider->id_provider
        )->findOrFail($id);

        $scholarship->update([

            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'required_documents' => array_values(array_filter($request->input('required_documents', []))),
            'benefit' => $request->benefit,
            'deadline' => $request->deadline,

        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil diperbarui');
    }

    public function destroy($id)
    {
        $scholarship = Scholarship::where(
            'id_provider',
            auth()->user()->provider->id_provider
        )->findOrFail($id);

        $scholarship->delete();

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil dihapus');
    }
}