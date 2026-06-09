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
        $user = auth()->user();

        if ($user->provider) {
            $providerId = $user->provider->id_provider;

            $applications = Application::whereHas('scholarship', function($query) use ($providerId) {
                $query->where('id_provider', $providerId);
            })->with(['user', 'scholarship'])->get();
        } else {
            $applications = collect();
        }

        return view('provider.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::with(['user.profile', 'scholarship', 'documents'])
                        ->findOrFail($id);

        return view('provider.applications.show', compact('application'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'link_wa' => 'required|url',
        ]);

        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        $linkWA = $request->input('link_wa');

        ApplicationStatusLog::create([
            'id_application' => $application->id_application, 
            'status'         => 'approved',
            'catatan'        => 'Application approved by provider. Group WA Link: ' . $linkWA,
            'tanggal_status' => now(),
        ]);

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
            'id_application' => $application->id_application, 
            'status'         => 'rejected',
            'catatan'        => 'Application rejected by provider',
            'tanggal_status' => now(),
        ]);

        return redirect()
            ->route('provider.applications.index')
            ->with('success', 'Application rejected successfully.');
    }
}