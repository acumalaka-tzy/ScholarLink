<?php

namespace App\Http\Controllers;

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

    public function verify($id)
    {
        $provider = Provider::findOrFail($id);

        $provider->status = 'verified';

        $provider->save();

        return redirect('/admin/providers')
            ->with('success', 'Provider berhasil diverifikasi');
    }

    public function reject($id)
    {
        $provider = Provider::findOrFail($id);

        $provider->status = 'rejected';

        $provider->save();

        return redirect('/admin/providers')
            ->with('success', 'Provider berhasil ditolak');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);

        $provider->delete();

        return redirect('/admin/providers')
            ->with('success', 'Provider berhasil dihapus');
    }

    public function create()
{
    return view('admin.providers.create');
}

    public function store(Request $request)
{
    $provider = Provider::create([
        'id_provider' => auth()->id(),
        'nama_instansi' => $request->nama_instansi,
        'deskripsi_instansi' => $request->deskripsi_instansi,
        'website' => $request->website,
        'email_kontak' => $request->email_kontak,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'status' => 'pending',
    ]);

    return redirect('/admin/providers')
        ->with('success', 'Provider berhasil ditambahkan');
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

        $provider->update([
            'nama_instansi' => $request->nama_instansi,
            'deskripsi_instansi' => $request->deskripsi_instansi,
            'website' => $request->website,
            'email_kontak' => $request->email_kontak,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/providers')
            ->with('success', 'Provider berhasil diupdate');
}

}