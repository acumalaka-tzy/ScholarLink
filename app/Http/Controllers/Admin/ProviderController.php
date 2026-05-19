<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('admin.providers.index', compact('providers'));
    }

    public function approve($provider)
{
    $provider = Provider::findOrFail($provider);

    $provider->status = 'verified';
    $provider->save();

    return back()->with('success', 'Provider berhasil diverifikasi');
}

public function reject($provider)
{
    $provider = Provider::findOrFail($provider);

    $provider->status = 'rejected';
    $provider->save();

    return back()->with('rejected', 'Provider berhasil ditolak');
}

public function show($provider)
{
    $provider = Provider::findOrFail($provider);
    return view('admin.providers.detail', compact('provider'));
}

public function destroy($provider)
{
    $provider = Provider::findOrFail($provider);
    $provider->delete();

    return back()->with('success', 'Provider berhasil dihapus');
}

public function edit($provider)
{
    $provider = Provider::findOrFail($provider);
    return view('admin.providers.edit', compact('provider'));
}

public function update(Request $request, $provider)
{
    $provider = Provider::findOrFail($provider);

    $request->validate([
        'nama_instansi' => 'required|string|max:255',
        'email_kontak' => 'required|email',
        'no_hp' => 'required|string|max:20',
        'website' => 'nullable|string|max:255',
        'alamat' => 'required|string',
        'deskripsi_instansi' => 'nullable|string',
    ]);

    $provider->update([
        'nama_instansi' => $request->nama_instansi,
        'email_kontak' => $request->email_kontak,
        'no_hp' => $request->no_hp,
        'website' => $request->website,
        'alamat' => $request->alamat,
        'deskripsi_instansi' => $request->deskripsi_instansi,
    ]);

    return redirect()
        ->route('admin.providers.index')
        ->with('success', 'Provider berhasil diperbarui');
}
}