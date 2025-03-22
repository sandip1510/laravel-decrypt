<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Existing dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // New route for handling encryption/decryption
    Route::post('/dashboard/encrypt-decrypt', [DashboardController::class, 'encryptDecrypt'])->name('dashboard.encrypt-decrypt');
});

require __DIR__.'/auth.php';
