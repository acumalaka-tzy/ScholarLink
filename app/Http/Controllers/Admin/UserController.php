<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\User;
use App\Models\AdminLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,provider,mahasiswa',
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'status' => $request->role === 'provider'
                ? 'pending'
                : 'aktif',
        ]);

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Menambahkan User Baru',
            'keterangan' => 'Admin menambahkan user baru dengan email: ' . $newUser->email . ' sebagai ' . $newUser->role
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dibuat');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'sometimes|required|in:admin,provider,mahasiswa',
            'status' => 'sometimes|required|in:aktif,pending,rejected,nonaktif',
        ]);

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('role')) {
            $user->role = $request->role;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->filled('status')) {
            $user->status = $request->status;
        }

        $user->save();

        if ($user->role === 'provider') {

            $provider = Provider::where('user_id', $user->id)->first();

            if ($provider) {

                $providerStatus = 'pending';

                if ($user->status === 'aktif') {
                    $providerStatus = 'verified';
                } elseif ($user->status === 'rejected') {
                    $providerStatus = 'rejected';
                } elseif ($user->status === 'nonaktif') {
                    $providerStatus = 'rejected';
                }

                $provider->update([
                    'status' => $providerStatus,
                ]);
            }
        }

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Memperbarui User',
            'keterangan' => 'Admin memperbarui data user: ' . $user->email
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $email = $user->email;
        $user->delete();

        AdminLog::create([
            'id_admin' => Auth::id(),
            'aktivitas' => 'Menghapus User',
            'keterangan' => 'Admin menghapus user dengan email: ' . $email
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus');
    }
}