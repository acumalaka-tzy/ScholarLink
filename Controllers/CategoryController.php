<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil semua data beasiswa dari database
        $scholarships = Scholarship::all();

        // Arahkan ke file kategori/index.blade.php sambil membawa data
        return view('kategori.index', compact('scholarships'));
    }
}
