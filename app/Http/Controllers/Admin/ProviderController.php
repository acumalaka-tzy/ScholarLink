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
}
