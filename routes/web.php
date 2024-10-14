<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Group routes under /dashboard prefix
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        // Resource routes for projects
        Route::resource('projects', ProjectController::class);
    });
});

// Publicly accessible routes
Route::get('/', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

require __DIR__.'/auth.php';
