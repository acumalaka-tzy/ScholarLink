<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Application;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Menampilkan semua document
    public function index()
    {
        $documents = Document::with('application')->get();

        return view('documents.index', compact('documents'));
    }

    // Form upload document
    public function create()
    {
        $applications = Application::all();

        return view('documents.create', compact('applications'));
    }

    // Simpan document
    public function store(Request $request)
    {
        $request->validate([
            'id_application' => 'required',
            'jenis_dokumen' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        // Upload file
        $file = $request->file('file');

        $filename = time() . '_' . $file->getClientOriginalName();

        $path = $file->storeAs(
            'documents',
            $filename,
            'public'
        );

        // Simpan database
        Document::create([
            'id_application' => $request->id_application,
            'jenis_dokumen' => $request->jenis_dokumen,
            'nama_file' => $filename,
            'file_path' => $path,
            'tanggal_upload' => now(),
        ]);

        return redirect('/documents')
            ->with('success', 'Document berhasil diupload');
    }
}