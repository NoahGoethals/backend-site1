<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

// ✅ Startpagina = nieuws-overzicht (alleen voor ingelogde gebruikers)
Route::get('/', [NewsController::class, 'index'])->middleware(['auth'])->name('home');

// ✅ Routes voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    // Nieuwsbeheer (alleen voor ingelogde gebruikers)
    Route::resource('news', NewsController::class);

    // FAQ-beheer (alleen voor ingelogde gebruikers)
    Route::resource('faqs', FaqController::class);

    // Categoriebeheer voor FAQ's (alleen voor ingelogde gebruikers)
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Profielbeheer
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Optioneel: dashboardpagina (indien gebruikt)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ✅ Authenticatie routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
