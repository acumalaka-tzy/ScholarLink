<?php

use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Scholarship Routes
Route::resource('scholarship', ScholarshipController::class);

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('kategori.index');

// Detail kategori
Route::get('/categories/{id}', [ScholarshipController::class, 'show'])
    ->name('kategori.detail');

// Dummy pages
Route::get('/applications', function () {
    return "Halaman Applications";
});

Route::get('/documents', function () {
    return "Halaman Documents";
});

Route::get('/application-status-logs', function () {
    return "Halaman Application Status Logs";
});

Route::get('/favorites', function () {
    return "Halaman Favorites";
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

Route::get('/admin-logs', function () {
    return "Halaman Admin Logs";
});

// Protected routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});