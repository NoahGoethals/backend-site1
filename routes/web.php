<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;

// ✅ Startpagina = nieuws-overzicht
Route::get('/', [NewsController::class, 'index'])->middleware(['auth'])->name('home');

// ✅ Nieuws & FAQ routes (alleen voor ingelogde users)
Route::middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('faqs', FaqController::class);

    // Profielbeheer
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Auth (login, register, password reset)
require __DIR__.'/auth.php';
