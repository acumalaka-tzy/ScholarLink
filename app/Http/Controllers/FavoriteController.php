<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Simpan favorite
    public function store($id)
    {
        Favorite::create([

            'id_user' => auth()->id(),

            'id_beasiswa' => $id

        ]);

        return redirect()
            ->back()
            ->with('success', 'Berhasil tambah favorite');
    }

    // List favorites
    public function index()
    {
        $favorites = Favorite::with('scholarship')
            ->where('id_user', auth()->id())
            ->get();

        return view(
            'favorites.index',
            compact('favorites')
        );
    }
}