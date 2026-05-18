<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Application;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('application')
            ->whereHas('application', function ($query) {
                $query->where('id_user', auth()->id());
            })
            ->get();

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $applications = Application::where('id_user', auth()->id())->get();

        return view('documents.create', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_application' => 'required',
            'jenis_dokumen' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg'
        ]);

        $filePath = $request->file('file')->store('documents', 'public');

        Document::create([
            'id_application' => $request->id_application,
            'jenis_dokumen' => $request->jenis_dokumen,
            'nama_file' => $request->file('file')->getClientOriginalName(),
            'file_path' => $filePath,
            'tanggal_upload' => now(),
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document uploaded!');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        $document->delete();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document deleted!');
    }
}