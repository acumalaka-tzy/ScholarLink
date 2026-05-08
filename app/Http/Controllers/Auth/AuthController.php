<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            $redirectPath = match($user->role) {
                'admin' => '/admin/dashboard',
                'provider' => '/provider/dashboard',
                default => '/dashboard',
            };
            return redirect()->intended($redirectPath)->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Show the registration form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'education_level' => 'nullable|string|in:sma,d3,s1,s2,s3',
            'role' => 'required|string|in:student,provider',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'agree' => 'accepted',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'education_level' => $validated['education_level'],
                'role' => $validated['role'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);
            $redirectPath = $user->role === 'provider' ? '/provider/dashboard' : '/dashboard';
            return redirect($redirectPath)->with('success', 'Pendaftaran berhasil! Selamat datang!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.')->withInput();
        }
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
