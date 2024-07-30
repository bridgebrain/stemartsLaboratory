<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Breeze Authentication Routes
require __DIR__.'/auth.php';

// Home Route
Route::get('/', [WikiController::class, 'index']);

Route::get('/wikis/{wiki}', [WikiController::class, 'show'])->name('wikis.show');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Define your Filament routes here if necessary
});

// Additional Routes for Your Application
Route::middleware(['auth'])->group(function () {
    // Define routes that require user authentication here
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Logout Route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});