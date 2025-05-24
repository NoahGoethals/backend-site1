<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

// ✅ Startpagina = nieuws-overzicht
Route::get('/', [NewsController::class, 'index'])->middleware(['auth'])->name('home');

// ✅ Routes voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ✅ Authenticatie (login, register, etc.)
require __DIR__.'/auth.php';
