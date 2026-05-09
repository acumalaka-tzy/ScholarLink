<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    
    Route::post('/logout', 'logout')->name('logout');
});

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// --- ROUTE BAGIAN (Katalog) ---
// Ditaruh di luar middleware auth dulu agar bisa diakses tanpa login/database
Route::get('/katalog', function () {
    return view('katalog.index'); // Mengarah ke folder katalog file index
})->name('katalog.index');

Route::get('/katalog/detail', function () {
    return view('katalog.detail'); // Mengarah ke folder katalog file detail
})->name('katalog.detail');