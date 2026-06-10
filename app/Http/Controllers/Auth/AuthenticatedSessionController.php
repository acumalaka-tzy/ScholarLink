<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Scholarship;
use App\Models\Application;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        $scholarshipCount = Scholarship::count();
        $awardeeCount = Application::where('status', 'diterima')->count();
        
        return view('auth.login', compact('scholarshipCount', 'awardeeCount'));
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        $user = $request->user();

    if ($user->role === 'provider') {

    if ($user->status === 'pending') {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Akun provider masih menunggu persetujuan admin.',
        ]);
    }

    if ($user->status === 'rejected') {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Akun provider ditolak admin.',
        ]);
    }
}

        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->role === 'provider') {
            return redirect()->intended(route('provider.dashboard'));
        }

        if ($user->role === 'mahasiswa') {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->intended(route('home'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}