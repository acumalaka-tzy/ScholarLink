<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class CategoryController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();

        return view('kategori.index', compact('scholarships'));
    }
}
