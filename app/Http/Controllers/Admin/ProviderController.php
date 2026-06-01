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

public function show($id)
{
    $provider = Provider::findOrFail($id);
    return view('admin.providers.show', compact('provider'));
}

public function edit($id)
{
    $provider = Provider::findOrFail($id);
    return view('admin.providers.edit', compact('provider'));
}

public function update(Request $request, $id)
{
    $provider = Provider::findOrFail($id);

    $request->validate([
        'nama_instansi' => 'required',
        'email_kontak' => 'required|email',
        'website' => 'nullable|url',
        'no_hp' => 'required',
        'alamat' => 'required',
        'deskripsi_instansi' => 'required',
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

public function destroy($id)
{
    $provider = Provider::findOrFail($id);
    $provider->delete();

    return redirect()
        ->route('admin.providers.index')
        ->with('success', 'Provider berhasil dihapus');
}

public function create()
{
    return view('admin.providers.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_instansi' => 'required',
        'email_kontak' => 'required|email',
        'website' => 'nullable|url',
        'no_hp' => 'required',
        'alamat' => 'required',
        'deskripsi_instansi' => 'required',
    ]);

    Provider::create([
        'nama_instansi' => $request->nama_instansi,
        'email_kontak' => $request->email_kontak,
        'website' => $request->website,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'deskripsi_instansi' => $request->deskripsi_instansi,
        'status' => 'pending',
        'user_id' => auth()->id(),
    ]);

    return redirect()
        ->route('admin.providers.index')
        ->with('success', 'Provider berhasil ditambahkan');
}

}
