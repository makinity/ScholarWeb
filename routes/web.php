<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('components.layout');
});

// Public Routes
Route::post('/register', [AuthController::class, 'register'])
     ->name('auth.register');

Route::post('/login', [AuthController::class, 'login'])
     ->name('auth.login');

Route::get('/profile/edit', [AuthController::class, 'edit'])
    ->name('profile.edit');

Route::put('/update-profile', [AuthController::class, 'update'])
    ->name('auth.update');

Route::get('/dashboard', function () {
    // Your dashboard view here
    return view('partials.dashboard');
})->name('dashboard');

Route::get('/dashboard/admin', function () {
    // Your dashboard view here
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/scholarships/index', function () {
    // Your dashboard view here
    return view('scholarships.index');
})->name('scholarships');

Route::get('/scholarships/quick-apply', function () {
    // Your dashboard view here
    return view('scholarships.quick-apply');
})->name('quick');

Route::get('/applications/show', function () {
    // Your dashboard view here
    return view('applications.index');
})->name('applications');

// Inside the admin routes section
Route::get('/admin/analytics', function () {
    return view('admin.analytics');
})->name('admin.analytics');

// Protected Routes
Route::post('/logout', [AuthController::class, 'logout'])
         ->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::post('/update-profile', [AuthController::class, 'update'])
         ->name('auth.update');
});

