<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStatusLog;
use App\Models\Document;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Application::with([
            'user',
            'scholarship.provider',
            'scholarship.category',
            'documents',
        ]);

        if ($user->role === 'mahasiswa') {
            $query->where('id_user', $user->id);
        }

        if ($user->role === 'provider') {
            $provider = $user->provider;

            abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

            $query->whereHas('scholarship', function ($q) use ($provider) {
                $q->where('id_provider', $provider->id_provider);
            });
        }

        $applications = $query->latest()->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $scholarships = Scholarship::with(['provider', 'category'])
            ->latest()
            ->get();

        $selectedScholarship = null;
        if (request()->has('id_beasiswa')) {
            $selectedScholarship = Scholarship::find(request('id_beasiswa'));
        }

        return view('applications.create', compact('scholarships', 'selectedScholarship'));
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $request->validate([
            'id_beasiswa' => [
                'required',
                'exists:scholarships,id_beasiswa',
                Rule::unique('applications', 'id_beasiswa')
                    ->where(fn ($query) => $query->where('id_user', auth()->id())),
            ],
            'catatan' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*.jenis_dokumen' => 'required_with:documents|string',
            'documents.*.file' => 'required_with:documents|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ], [
            'id_beasiswa.unique' => 'Kamu sudah pernah apply beasiswa ini.',
            'documents.*.file.required_with' => 'File dokumen harus diunggah.',
            'documents.*.file.mimes' => 'File harus berformat PDF, DOC, DOCX, JPG, JPEG, atau PNG.',
            'documents.*.file.max' => 'Ukuran file maksimal 5MB.',
        ]);

        $scholarship = Scholarship::where('id_beasiswa', $request->id_beasiswa)
            ->firstOrFail();

        $application = Application::create([
            'id_user' => auth()->id(),
            'id_beasiswa' => $scholarship->id_beasiswa,
            'tanggal_apply' => now(),
            'status' => 'pending',
            'catatan' => $request->catatan ?? null,
        ]);

        if ($request->has('documents') && is_array($request->documents)) {
            foreach ($request->documents as $document) {
                if (isset($document['file']) && $document['file'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $document['file'];

                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $path = $file->storeAs(
                        'applications/' . $application->id_application,
                        $filename
                    );

                    Document::create([
                        'id_application' => $application->id_application,
                        'jenis_dokumen' => $document['jenis_dokumen'] ?? 'Dokumen Pendukung',
                        'nama_file' => $file->getClientOriginalName(),
                        'file_path' => $path,
                        'tanggal_upload' => now(),
                    ]);
                }
            }
        }

        ApplicationStatusLog::create([
            'id_application' => $application->id_application,
            'status' => 'pending',
            'catatan' => 'Application berhasil dibuat',
            'tanggal_status' => now(),
        ]);

        return redirect()
            ->route('applications.index')
            ->with('success', "Berhasil apply beasiswa {$scholarship->nama_beasiswa}! Data aplikasi Anda telah dikirim.");
    }

    public function show($id)
    {
        $application = Application::with([
            'user',
            'scholarship.provider',
            'scholarship.category',
            'documents',
            'statusLogs',
        ])
            ->where('id_application', $id)
            ->firstOrFail();

        $user = auth()->user();

        if ($user->role === 'mahasiswa' && $application->id_user !== $user->id) {
            abort(403, 'Unauthorized');
        }

        if ($user->role === 'provider') {
            $provider = $user->provider;

            abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');
            abort_if($application->scholarship->id_provider !== $provider->id_provider, 403, 'Unauthorized');
        }

        return view('applications.show', compact('application'));
    }

    public function approve($id)
    {
        $application = $this->findApplicationForProviderOrAdmin($id);

        $application->update([
            'status' => 'approved',
            'catatan' => 'Application disetujui provider',
        ]);

        ApplicationStatusLog::create([
            'id_application' => $application->id_application,
            'status' => 'approved',
            'catatan' => 'Application disetujui provider',
            'tanggal_status' => now(),
        ]);

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application approved.');
    }

    public function reject($id)
    {
        $application = $this->findApplicationForProviderOrAdmin($id);

        $application->update([
            'status' => 'rejected',
            'catatan' => 'Application ditolak provider',
        ]);

        ApplicationStatusLog::create([
            'id_application' => $application->id_application,
            'status' => 'rejected',
            'catatan' => 'Application ditolak provider',
            'tanggal_status' => now(),
        ]);

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application rejected.');
    }

    private function findApplicationForProviderOrAdmin($id): Application
    {
        $user = auth()->user();

        abort_if(! in_array($user->role, ['admin', 'provider']), 403);

        $query = Application::with('scholarship.provider')
            ->where('id_application', $id);

        if ($user->role === 'provider') {
            $provider = $user->provider;

            abort_if(! $provider, 403, 'Akun provider belum terhubung dengan data provider.');

            $query->whereHas('scholarship', function ($q) use ($provider) {
                $q->where('id_provider', $provider->id_provider);
            });
        }

        return $query->firstOrFail();
    }

    public function destroy($id)
    {
        $application = Application::with('documents')
            ->where('id_application', $id)
            ->firstOrFail();

        abort_if(auth()->user()->id !== $application->id_user, 403, 'Unauthorized');

        abort_if($application->status !== 'pending', 403, 'Tidak dapat membatalkan aplikasi yang sudah diproses.');

        foreach ($application->documents as $document) {
            Storage::delete($document->file_path);
            $document->delete();
        }

        $application->delete();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Aplikasi berhasil dibatalkan.');
    }
}