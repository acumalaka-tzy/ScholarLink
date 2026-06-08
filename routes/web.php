<?php

use Illuminate\Support\Facades\Route;
use App\Models\Scholarship;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Provider\ScholarshipController as ProviderScholarshipController;
use App\Http\Controllers\Provider\ApplicationController as ProviderApplicationController;
use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use App\Http\Controllers\Admin\ScholarshipController as AdminScholarshipController;

Route::get('/', function () {
    $scholarships = Scholarship::with(['provider', 'category'])
        ->where('status', 'aktif')
        ->orderByDesc('tanggal_dibuat')
        ->take(6)
        ->get();
    return view('home', compact('scholarships'));
})->name('home');

// ==========================
// ADMIN AREA
// ==========================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('providers', ProviderController::class)->except(['create', 'store']);
        Route::put('providers/{provider}/approve', [ProviderController::class, 'approve'])->name('providers.approve');
        Route::put('providers/{provider}/reject', [ProviderController::class, 'reject'])->name('providers.reject');
        Route::resource('scholarships', AdminScholarshipController::class)->only(['index', 'update']);
        Route::get('/admin-logs', function () { return "Halaman Admin Logs"; })->name('logs');
    });

// ==========================
// PROVIDER AREA
// ==========================
Route::middleware(['auth', 'verified', 'provider'])
    ->prefix('provider')
    ->name('provider.')
    ->group(function () {
        Route::get('/', [ProviderDashboardController::class, 'index'])->name('dashboard');
        Route::get('/chat-rooms', [ChatRoomController::class, 'providerIndex'])->name('chat-rooms.index');
        Route::resource('scholarships', ProviderScholarshipController::class);
        Route::resource('applications', ProviderApplicationController::class);
        Route::patch('applications/{id}/approve', [ProviderApplicationController::class, 'approve'])->name('applications.approve');
        Route::patch('applications/{id}/reject', [ProviderApplicationController::class, 'reject'])->name('applications.reject');
    });

// ==========================
// MAHASISWA & COMMON AREA
// ==========================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['mahasiswa'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites.store');
        Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
        Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
        Route::resource('documents', DocumentController::class);
    });

    Route::get('/scholarships/{id}/chat-rooms', [ChatRoomController::class, 'index'])->name('chat-rooms.index.scholarship');
    Route::post('/chat-rooms/store/{id_beasiswa?}', [ChatRoomController::class, 'store'])->name('chat-rooms.store');
    Route::get('/chat-rooms/{id}', [ChatRoomController::class, 'show'])->name('chat-rooms.show');
    Route::post('/chat-rooms/{id}/messages', [ChatRoomController::class, 'sendMessage'])->name('chat-rooms.messages.store');

    Route::resource('applications', ApplicationController::class);
    Route::post('/applications/{id}/approve', [ApplicationController::class, 'approve'])->name('applications.approve');
    Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
    Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    Route::post('/applications/{id}/documents', [DocumentController::class, 'store'])->name('documents.store');
});

// ==========================
// PUBLIC & PROFILE
// ==========================
Route::get('/categories', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/categories/{id}', [ScholarshipController::class, 'show'])->name('kategori.detail');
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/{id}', [ScholarshipController::class, 'show'])->name('scholarships.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';