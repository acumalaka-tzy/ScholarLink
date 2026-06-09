<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Document::with([
            'application.user',
            'application.scholarship.provider',
        ]);

        if ($user->role === 'mahasiswa') {
            $query->whereHas('application', function ($q) use ($user) {
                $q->where('id_user', $user->id);
            });
        }

        if ($user->role === 'provider') {
            $provider = $user->provider;

            abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

            $query->whereHas('application.scholarship', function ($q) use ($provider) {
                $q->where('id_provider', $provider->id_provider);
            });
        }

        $documents = $query->latest()->get();

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $applications = Application::with('scholarship')
            ->where('id_user', auth()->id())
            ->latest()
            ->get();

        return view('documents.create', compact('applications'));
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $request->validate([
            'id_application' => 'required|exists:applications,id_application',
            'jenis_dokumen' => 'required|string|max:100',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $application = Application::where('id_application', $request->id_application)
            ->where('id_user', auth()->id())
            ->firstOrFail();

        $file = $request->file('file');

        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'documents/' . auth()->id(),
            $filename,
            'public'
        );

        Document::create([
            'id_application' => $application->id_application,
            'jenis_dokumen' => $request->jenis_dokumen,
            'nama_file' => $file->getClientOriginalName(),
            'file_path' => $path,
            'tanggal_upload' => now(),
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Dokumen berhasil diupload.');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        $application = $document->application;
        $user = auth()->user();

        // Authorization check
        if ($user->role === 'mahasiswa' && $application->id_user !== $user->id) {
            abort(403, 'Unauthorized');
        }

        if ($user->role === 'provider') {
            $provider = $user->provider;
            abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');
            abort_if($application->scholarship->id_provider !== $provider->id_provider, 403, 'Unauthorized');
        }

        return response()->download(
            storage_path('app/public/' . $document->file_path),
            $document->nama_file
        );
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $application = $document->application;

        // Only owner can delete their own documents
        abort_if(auth()->user()->id !== $application->id_user, 403, 'Unauthorized');

        // Can only delete if application is still pending
        abort_if($application->status !== 'pending', 403, 'Tidak dapat menghapus dokumen setelah aplikasi diproses.');

        // Delete file from storage
        \Illuminate\Support\Facades\Storage::disk('public')->delete($document->file_path);

        // Delete document record
        $document->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}