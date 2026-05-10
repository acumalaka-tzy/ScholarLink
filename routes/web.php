<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ScholarshipController;

// Home route - accessible to all users (authenticated and guests)
Route::get('/', function () {
    $scholarships = \App\Models\Scholarship::active()->get();
    return view('home', ['scholarships' => $scholarships]);
})->name('home');

// Authentication routes
    /*
|--------------------------------------------------------------------------
| ScholarLink Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return "Halaman Users";
});

Route::get('/profiles', function () {
    return "Halaman Profiles";
});

Route::get('/providers', function () {
    return "Halaman Providers";
});

Route::get('/categories', function () {
    return "Halaman Categories";
});

Route::get('/scholarships', [ScholarshipController::class, 'index']);

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

// Logout - for authenticated users only
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
