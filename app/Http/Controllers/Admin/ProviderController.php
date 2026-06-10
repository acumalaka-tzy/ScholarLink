<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\AdminLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::with('user')->get();

        return view('admin.providers.index', compact('providers'));
    }


    public function show(Provider $provider)
    { 
        return view('admin.providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'email_kontak' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'deskripsi_instansi' => 'required|string',
        ]);

        $provider->update([
            'nama_instansi' => $request->nama_instansi,
            'email_kontak' => $request->email_kontak,
            'website' => $request->website,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'deskripsi_instansi' => $request->deskripsi_instansi,
        ]);

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Memperbarui Provider',
            'keterangan' => 'Admin memperbarui profil provider: ' . $provider->nama_instansi
        ]);

        return redirect()
            ->route('admin.providers.index')
            ->with('success', 'Provider berhasil diperbarui');
    }

    public function destroy(Provider $provider)
    {
        $nama_instansi = $provider->nama_instansi;
        $provider->delete();

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Menghapus Provider',
            'keterangan' => 'Admin menghapus provider: ' . $nama_instansi
        ]);

        return redirect()
            ->route('admin.providers.index')
            ->with('success', 'Provider berhasil dihapus');
    }

    public function approve(Provider $provider)
    {
        $provider->update([
            'status' => 'verified',
        ]);

        $provider->user->update([
            'status' => 'aktif',
        ]);

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Memverifikasi Provider',
            'keterangan' => 'Admin memverifikasi (approve) provider: ' . $provider->nama_instansi
        ]);

        return back()->with('success', 'Provider berhasil diverifikasi');
    }

    public function reject(Provider $provider)
    {
        $provider->update([
            'status' => 'rejected',
        ]);

        $provider->user->update([
            'status' => 'rejected',
        ]);

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Menolak Provider',
            'keterangan' => 'Admin menolak (reject) provider: ' . $provider->nama_instansi
        ]);

        return back()->with('success', 'Provider berhasil ditolak');
    }
}
