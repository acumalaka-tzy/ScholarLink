<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {

            $query->where('nama', 'like', "%{$search}%");

        })->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nama' => 'required',

        'email' => 'required|email',

        'password' => 'required|min:6',

        'role' => 'required',

    ], [

        'nama.required' => 'Nama wajib diisi',

        'email.required' => 'Email wajib diisi',

        'email.email' => 'Format email tidak valid',

        'password.required' => 'Password wajib diisi',

        'password.min' => 'Password minimal 6 karakter',

        'role.required' => 'Role wajib dipilih',

    ]);

    User::create([

        'nama' => $request->nama,

        'email' => $request->email,

        'password' => bcrypt($request->password),

        'role' => $request->role,

        'status' => 'aktif',

        'tanggal_daftar' => now(),

    ]);

    return redirect()->route('users.index')
        ->with('success', 'User berhasil ditambahkan');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([

        'nama' => 'required',

        'email' => 'required|email',

        'role' => 'required',

    ], [

        'nama.required' => 'Nama wajib diisi',

        'email.required' => 'Email wajib diisi',

        'email.email' => 'Format email tidak valid',

        'role.required' => 'Role wajib dipilih',

    ]);

    $user = User::findOrFail($id);

    $user->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()->route('users.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/admin/users')
            ->with('success', 'User berhasil dihapus');
    }
}
