<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.scholarships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Scholarship::create([

            'id_provider' =>
                auth()->user()->provider->id_provider,

            'id_kategori' => $request->id_kategori,

            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'benefit' => $request->benefit,
            'tipe' => $request->tipe,
            'deadline' => $request->deadline,
            'tanggal_dibuat' => now(),
            'status' => 'active',

        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
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
            'benefit' => $request->benefit,
            'deadline' => $request->deadline,

        ]);

        return redirect()
            ->route('provider.scholarships.index')
            ->with('success', 'Scholarship berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
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