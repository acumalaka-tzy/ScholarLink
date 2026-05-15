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

        public function approve($id)
    {
        $application = Application::findOrFail($id);

        $application->status = 'approved';

        $application->save();

        ApplicationStatusLog::create([

            'id_application' => $application->id_application,

            'status' => 'approved',

            'catatan' => 'Application approved by provider',

            'tanggal_status' => now(),

        ]);

        return redirect()
            ->back()
            ->with('success', 'Application approved');
    }

        public function reject($id)
    {
        $application = Application::findOrFail($id);

        $application->status = 'rejected';

        $application->save();

        ApplicationStatusLog::create([

            'id_application' => $application->id_application,

            'status' => 'rejected',

            'catatan' => 'Application rejected by provider',

            'tanggal_status' => now(),

        ]);

        return redirect()
            ->back()
            ->with('success', 'Application rejected');
    }
}