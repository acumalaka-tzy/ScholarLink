<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the provider.
     */
    public function index()
    {
        $providers = Provider::with('user')->get();

        return view('admin.providers.index', compact('providers'));
    }


    /**
     * Display the specified provider.
     */
    public function show(Provider $provider)
    {
        return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified provider.
     */
    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update the specified provider in storage.
     */
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

        return redirect()
            ->route('admin.providers.index')
            ->with('success', 'Provider berhasil diperbarui');
    }

    /**
     * Remove the specified provider from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()
            ->route('admin.providers.index')
            ->with('success', 'Provider berhasil dihapus');
    }

    /**
     * Approve the specified provider's account.
     */
    public function approve(Provider $provider)
    {
        // Status provider
        $provider->update([
            'status' => 'verified',
        ]);

        // Status user
        $provider->user->update([
            'status' => 'aktif',
        ]);

        return back()->with('success', 'Provider berhasil diverifikasi');
    }

    /**
     * Reject the specified provider's account.
     */
    public function reject(Provider $provider)
    {
        // Status provider
        $provider->update([
            'status' => 'rejected',
        ]);

        // Status user
        $provider->user->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Provider berhasil ditolak');
    }
}
