<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStatusLog;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // List applications
    public function index()
    {
        $applications = Application::with([
            'user',
            'scholarship'
        ])->get();

        return view('applications.index', compact('applications'));
    }

    // Form apply
    public function create()
    {
        $scholarships = Scholarship::all();

        return view('applications.create', compact('scholarships'));
    }

    // Simpan application
    public function store(Request $request)
    {
        $request->validate([
            'id_beasiswa' => 'required'
        ]);

        // Simpan application
        $application = Application::create([

            'id_user' => auth()->id(),

            'id_beasiswa' => $request->id_beasiswa,

            'tanggal_apply' => now(),

            'status' => 'pending',

        ]);

        // Simpan log status
        ApplicationStatusLog::create([

            'id_application' => $application->id_application,

            'status' => 'pending',

            'catatan' => 'Application berhasil dibuat',

            'tanggal_status' => now(),

        ]);

        return redirect('/applications')
            ->with('success', 'Berhasil apply scholarship');
    }

    // Approve
    public function approve($id)
    {
        $application = Application::findOrFail($id);

        $application->status = 'approved';

        $application->save();

        return back();

        ApplicationStatusLog::create([

            'id_application' => $application->id_application,

            'status' => 'approved',

            'catatan' => 'Application disetujui provider',

            'tanggal_status' => now(),

        ]);

        return redirect('/applications')
            ->with('success', 'Application approved');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        $application->delete();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application berhasil dibatalkan');
    }

    // Reject
    public function reject($id)
    {
        $application = Application::findOrFail($id);

        $application->status = 'rejected';

        $application->save();

        ApplicationStatusLog::create([

            'id_application' => $application->id_application,

            'status' => 'rejected',

            'catatan' => 'Application ditolak provider',

            'tanggal_status' => now(),

        ]);

        return redirect('/applications')
            ->with('success', 'Application rejected');
    }
}