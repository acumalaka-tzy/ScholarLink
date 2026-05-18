<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStatusLog;
use App\Models\Scholarship;
use Illuminate\Http\Request;
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
            ->where('status', 'aktif')
            ->whereDate('deadline', '>=', now())
            ->latest()
            ->get();

        return view('applications.create', compact('scholarships'));
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
        ], [
            'id_beasiswa.unique' => 'Kamu sudah pernah apply beasiswa ini.',
        ]);

        $scholarship = Scholarship::where('id_beasiswa', $request->id_beasiswa)
            ->where('status', 'aktif')
            ->whereDate('deadline', '>=', now())
            ->firstOrFail();

        $application = Application::create([
            'id_user' => auth()->id(),
            'id_beasiswa' => $scholarship->id_beasiswa,
            'tanggal_apply' => now(),
            'status' => 'pending',
            'catatan' => null,
        ]);

        ApplicationStatusLog::create([
            'id_application' => $application->id_application,
            'status' => 'pending',
            'catatan' => 'Application berhasil dibuat',
            'tanggal_status' => now(),
        ]);

        return redirect()
            ->route('applications.index')
            ->with('success', 'Berhasil apply beasiswa.');
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
}