<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ApplicationStatusLog;

class ApplicationController extends Controller
{
    public function index()
    {
        // Ambil data user yang lagi login
        $user = auth()->user();

        // Cek apakah user ini punya data di tabel providers
        if ($user->provider) {
            $providerId = $user->provider->id_provider;

            // Ambil aplikasi hanya untuk beasiswa milik provider ini
            $applications = Application::whereHas('scholarship', function($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            })->with(['user', 'scholarship'])->get();
        } else {
            // Kalau ternyata user login tapi bukan provider, kasih data kosong
            $applications = collect();
        }

        return view('provider.applications.index', compact('applications'));
    }

    // ======================================================================
    // FUNGSI DETAIL - SUDAH SINKRON TOTAL DENGAN RELASI PROFILE & DOCUMENTS
    // ======================================================================
    public function show($id)
    {
        // Menggunakan findOrFail dengan tambahan eager loading untuk memuat data dokumen dan profile user
        $application = Application::with(['user.profile', 'scholarship', 'documents'])
                        ->findOrFail($id);

        return view('provider.applications.show', compact('application'));
    }

    public function approve(Request $request, $id)
    {
        // Validasi input link_wa terlebih dahulu jika ada
        $request->validate([
            'link_wa' => 'required|url',
        ]);

        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        // Ambil link_wa dari form input modal
        $linkWA = $request->input('link_wa');

        ApplicationStatusLog::create([
            'id_application' => $application->id_application, // Mengikuti penamaan kolom kelompokmu
            'status'         => 'approved',
            'catatan'        => 'Application approved by provider. Group WA Link: ' . $linkWA,
            'tanggal_status' => now(),
        ]);

        // Karena dieksekusi dari halaman detail, dialihkan kembali ke halaman index applications
        return redirect()
            ->route('provider.applications.index')
            ->with('success', 'Application approved and WhatsApp link saved!');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        ApplicationStatusLog::create([
            'id_application' => $application->id_application, // Mengikuti penamaan kolom kelompokmu
            'status'         => 'rejected',
            'catatan'        => 'Application rejected by provider',
            'tanggal_status' => now(),
        ]);

        // Dialihkan kembali ke halaman index applications
        return redirect()
            ->route('provider.applications.index')
            ->with('success', 'Application rejected successfully.');
    }

    public function show($id)
    {
        $application = Application::with(['user', 'scholarship'])->findOrFail($id);

        return view('provider.applications.show', compact('application'));
    }
}