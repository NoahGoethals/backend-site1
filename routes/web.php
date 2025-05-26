<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hier worden alle web-routes gedefinieerd. De meeste routes vereisen
| authenticatie, behalve de publieke profielpagina.
|
*/

// ✅ Startpagina = nieuws-overzicht (alleen voor ingelogde gebruikers)
Route::get('/', [NewsController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

// ✅ Publieke profielpagina – toegankelijk zonder login
Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.public');

// ✅ Routes voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    // Nieuws, FAQ's en categorieën
    Route::resource('news', NewsController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Eigen profiel bewerken
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ✅ Authenticatie routes (login, register, wachtwoord reset, ...)
require __DIR__.'/auth.php';
