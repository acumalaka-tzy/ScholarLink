<?php

use Illuminate\Support\Facades\Route;

use App\Models\Scholarship;

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Provider\ScholarshipController as ProviderScholarshipController;
use App\Http\Controllers\Provider\ApplicationController as ProviderApplicationController;
use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use App\Http\Controllers\Admin\ScholarshipController as AdminScholarshipController;


Route::get('/', function () {

    $scholarships = Scholarship::all();

    return view('home', compact('scholarships'));

});


// ==========================
// ADMIN AREA
// ==========================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('users', UserController::class);

        Route::resource('providers', ProviderController::class);
        
        Route::put(
                'providers/{provider}/approve',
                [ProviderController::class, 'approve']
            )->name('providers.approve');
        Route::put(
                'providers/{provider}/reject',
                [ProviderController::class, 'reject']
            )->name('providers.reject');

        Route::resource('scholarships', AdminScholarshipController::class);

        Route::get('/admin-logs', function () {
            return "Halaman Admin Logs";
        })->name('logs');

});


// ==========================
// PROVIDER AREA
// ==========================

Route::middleware(['auth', 'provider'])
    ->prefix('provider')
    ->name('provider.')
    ->group(function () {

        Route::get(
            '/',
            [ProviderDashboardController::class, 'index']
        )->name('dashboard');

        Route::resource(
            'scholarships',
            ProviderScholarshipController::class
        );

        Route::resource(
            'applications',
            ProviderApplicationController::class
        );

        Route::patch(
            'applications/{id}/approve',
            [ProviderApplicationController::class, 'approve']
        )->name('applications.approve');

        Route::patch(
            'applications/{id}/reject',
            [ProviderApplicationController::class, 'reject']
        )->name('applications.reject');

});


// ==========================
// MAHASISWA AREA
// ==========================

Route::middleware(['auth'])->group(function () {

    // Dashboard umum
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


Route::middleware(['auth', 'mahasiswa'])->group(function () {

    // Favorites
    Route::post(
        '/favorites/{id}', [FavoriteController::class, 'store']
    )->name('favorites.store');

    Route::get(
        '/favorites', [FavoriteController::class, 'index']
    )->name('favorites.index');

    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])
    ->name('favorites.destroy');

    // Documents
    Route::resource('documents', DocumentController::class);

});


// ==========================
// APPLICATION AREA
// ==========================

Route::middleware(['auth'])->group(function () {

    Route::resource('applications', ApplicationController::class);

    Route::post('/applications/{id}/approve', [ApplicationController::class, 'approve'])
    ->name('applications.approve');

    Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject'])
    ->name('applications.reject');

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

// Scholarship list
Route::get(
    '/scholarships',
    [ScholarshipController::class, 'index']
)->name('scholarships.index');

// Detail scholarship
Route::get(
    '/scholarships/{id}',
    [ScholarshipController::class, 'show']
)->name('scholarships.show');

// ==========================
// OTHER PAGES
// ==========================

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

    return redirect('/');

});

require __DIR__.'/auth.php';