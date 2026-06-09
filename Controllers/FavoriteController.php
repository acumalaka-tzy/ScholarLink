<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Scholarship;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('scholarship.provider', 'scholarship.category')
            ->where('id_user', auth()->id())
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    public function store($id)
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $scholarship = Scholarship::where('id_beasiswa', $id)
            ->where('status', 'aktif')
            ->firstOrFail();

        $favorite = Favorite::firstOrCreate([
            'id_user' => auth()->id(),
            'id_beasiswa' => $scholarship->id_beasiswa,
        ]);

        // Check if this is AJAX request
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $favorite->wasRecentlyCreated 
                    ? 'Berhasil tambah ke favorite!' 
                    : 'Sudah ada di favorite',
                'is_new' => $favorite->wasRecentlyCreated,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Berhasil tambah favorite.');
    }

    public function destroy($id)
    {
        abort_if(auth()->user()->role !== 'mahasiswa', 403);

        $favorite = Favorite::where('id_favorite', $id)
            ->where('id_user', auth()->id())
            ->first();

        abort_if(!$favorite, 404);

        $favorite->delete();

        // Check if this is AJAX request
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil hapus dari favorite!',
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Favorite berhasil dihapus.');
    }
}