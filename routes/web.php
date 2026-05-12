<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


// ==========================
// ADMIN AREA
// ==========================

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin-logs', function () {
        return "Halaman Admin Logs";
    });

});


// ==========================
// PROVIDER AREA
// ==========================

Route::middleware(['auth', 'provider'])->group(function () {

    // CRUD Scholarship
    Route::resource('scholarship', ScholarshipController::class);

});


// ==========================
// MAHASISWA AREA
// ==========================

Route::middleware(['auth', 'mahasiswa'])->group(function () {

    // Dashboard mahasiswa
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Favorites
    Route::get('/favorites', function () {
        return "Halaman Favorites";
    });

    // Application Scholarship
    Route::resource('applications', ApplicationController::class);

});


// ==========================
// PUBLIC AREA
// ==========================

// Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('kategori.index');

// Detail kategori
Route::get('/categories/{id}', [ScholarshipController::class, 'show'])
    ->name('kategori.detail');


// ==========================
// OTHER PAGES
// ==========================

Route::get('/documents', function () {
    return "Halaman Documents";
});

Route::get('/application-status-logs', function () {
    return "Halaman Application Status Logs";
});

Route::get('/chat-rooms', function () {
    return "Halaman Chat Rooms";
});

Route::get('/chat-participants', function () {
    return "Halaman Chat Participants";
});

Route::get('/messages', function () {
    return "Halaman Messages";
});


// ==========================
// PROFILE
// ==========================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// ==========================
// LOGOUT TEST
// ==========================

Route::get('/logout-test', function () {

    auth()->logout();

    return redirect('/login');

});

require __DIR__.'/auth.php';