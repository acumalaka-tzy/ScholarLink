<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::with(['provider', 'category'])
            ->latest()
            ->get();

        return view('scholarships.index', compact('scholarships'));
    }

    public function show($id)
    {
        $scholarship = Scholarship::with(['provider', 'category'])
            ->where('id_beasiswa', $id)
            ->firstOrFail();

        return view('scholarships.show', compact('scholarship'));
    }

    public function create()
    {
        abort_if(auth()->user()->role !== 'provider', 403);

        $provider = auth()->user()->provider;

        abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

        $categories = Category::all();

        return view('scholarships.create', compact('provider', 'categories'));
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->role !== 'provider', 403);

        $provider = auth()->user()->provider;

        abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

        $request->validate([
            'id_kategori' => 'required|exists:categories,id_kategori',
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat' => 'required|string',
            'benefit' => 'required|string',
            'tipe' => 'required|string|max:100',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        Scholarship::create([
            'id_provider' => $provider->id_provider,
            'id_kategori' => $request->id_kategori,
            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'benefit' => $request->benefit,
            'tipe' => $request->tipe,
            'deadline' => $request->deadline,
            'tanggal_dibuat' => now(),
            'status' => 'aktif',
        ]);

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        abort_if(auth()->user()->role !== 'provider', 403);

        $scholarship = $this->findScholarshipForCurrentProvider($id);

        $categories = Category::all();

        return view('scholarships.edit', compact('scholarship', 'categories'));
    }

    public function update(Request $request, $id)
    {
        abort_if(auth()->user()->role !== 'provider', 403);

        $scholarship = $this->findScholarshipForCurrentProvider($id);

        $request->validate([
            'id_kategori' => 'required|exists:categories,id_kategori',
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat' => 'required|string',
            'benefit' => 'required|string',
            'tipe' => 'required|string|max:100',
            'deadline' => 'required|date',
            'status' => 'required|in:aktif,nonaktif,ditutup',
        ]);

        $scholarship->update([
            'id_kategori' => $request->id_kategori,
            'nama_beasiswa' => $request->nama_beasiswa,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'benefit' => $request->benefit,
            'tipe' => $request->tipe,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        abort_if(auth()->user()->role !== 'provider', 403);

        $scholarship = $this->findScholarshipForCurrentProvider($id);

        $scholarship->delete();

        return redirect()
            ->route('scholarship.index')
            ->with('success', 'Beasiswa berhasil dihapus.');
    }

    private function findScholarshipForCurrentProvider($id): Scholarship
    {
        $provider = auth()->user()->provider;

        abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

        return Scholarship::where('id_beasiswa', $id)
            ->where('id_provider', $provider->id_provider)
            ->firstOrFail();
    }
}