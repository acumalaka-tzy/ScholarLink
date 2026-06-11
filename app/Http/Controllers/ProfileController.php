<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $request->user()->load('profile');

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $fotoProfil = $user->profile->foto_profil ?? null;
        $fotoSampul = $user->profile->foto_sampul ?? null;

        if ($request->hasFile('foto_profil')) {
            $fotoProfil = $request->file('foto_profil')
                ->store('profiles/foto-profil');
        }

        if ($request->hasFile('foto_sampul')) {
            $fotoSampul = $request->file('foto_sampul')
                ->store('profiles/foto-sampul');
        }

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'bio' => $request->bio,
                'universitas' => $request->universitas,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
                'foto_profil' => $fotoProfil,
                'foto_sampul' => $fotoSampul,
            ]
        );

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}