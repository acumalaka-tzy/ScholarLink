<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\AdminLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();

        return view('admin.scholarships.index', compact('scholarships'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif,ditutup',
        ]);

        $scholarship->update([
            'status' => $request->status,
        ]);

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Mengubah Status Beasiswa',
            'keterangan' => 'Admin mengubah status beasiswa "' . $scholarship->nama_beasiswa . '" menjadi: ' . $request->status
        ]);

        return redirect()->route('admin.scholarships.index')
                         ->with('success', 'Status beasiswa berhasil diperbarui.');
    }
}
