<?php

use App\Http\Controllers\ImageUploadController;
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

Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('image.upload');

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

use App\Http\Controllers\AboutMeController;

// Public route for showing the "About Me" page
Route::get('/about-me', [AboutMeController::class, 'show'])->name('about_me.show');

// Group routes under the 'admin' prefix for authenticated users
Route::middleware('auth')->group(function () {
    // About Me management routes
    Route::get('/about-me/edit', [AboutMeController::class, 'edit'])->name('about_me.edit');
    Route::post('/about-me/update', [AboutMeController::class, 'update'])->name('about_me.update');
});




Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

require __DIR__.'/auth.php';
