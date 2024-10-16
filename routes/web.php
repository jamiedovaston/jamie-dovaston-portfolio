<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group routes for authenticated users
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Group project management routes under /dashboard prefix
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        // Resource routes for projects (excluding the show route)
        Route::resource('projects', AdminProjectController::class)->except(['show']);
    });
});

Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

require __DIR__.'/auth.php';
