<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function __invoke(
        EmailVerificationRequest $request
    ): RedirectResponse
    {
        $user = $request->user();

        if (! $user->hasVerifiedEmail()) {

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
        }

        // Provider masih menunggu persetujuan admin
        if (
            $user->role === 'provider' &&
            $user->status === 'pending'
        ) {
            Auth::logout();

            return redirect()
                ->route('login')
                ->with(
                    'success',
                    'Email berhasil diverifikasi. Silakan tunggu persetujuan admin.'
                );
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'provider') {
            return redirect()->route('provider.dashboard');
        }

        return redirect()->route('dashboard');
    }
}