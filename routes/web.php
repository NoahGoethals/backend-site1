<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hier definieer je alle web-routes van je applicatie.
| Publieke pagina’s, ingelogde routes en profile-routes zijn gescheiden.
|
*/

// -----------------------------------------------------
// 1) Startpagina (nieuwsoverzicht) — alleen voor ingelogde gebruikers
// -----------------------------------------------------
Route::get('/', [NewsController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// -----------------------------------------------------
// 2) Publieke profielpagina (zonder login)
// -----------------------------------------------------
Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.public');

// -----------------------------------------------------
// 3) Authenticatie-routes (login, register, wachtwoord reset, etc.)
// -----------------------------------------------------
require __DIR__ . '/auth.php';

// -----------------------------------------------------
// 4) Routes voor ingelogde gebruikers
// -----------------------------------------------------
Route::middleware('auth')->group(function () {

    // --- Nieuwsbeheer (CRUD via resource controller) ---
    Route::resource('news', NewsController::class);

    // --- FAQ’s (voor bezoekers: index; voor admins: CRUD) ---
    // 4a) Publieke FAQ-lijst, gegroepeerd per categorie
    Route::get('/faqs', [FaqController::class, 'index'])
         ->name('faqs.index');

    // 4b) Gewone gebruikers kunnen een vraag indienen
    Route::get('/faqs/ask',    [FaqController::class, 'ask'])
         ->name('faqs.ask');
    Route::post('/faqs/ask',   [FaqController::class, 'submit'])
         ->name('faqs.submit');

    // 4c) Admin-only CRUD op FAQ’s
    Route::middleware('can:admin')->group(function () {
        Route::get('/faqs/create',     [FaqController::class, 'create'])->name('faqs.create');
        Route::post('/faqs',           [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::patch('/faqs/{faq}',    [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{faq}',   [FaqController::class, 'destroy'])->name('faqs.destroy');
    });

    // --- Categorieënbeheer (admins) ---
    Route::middleware('can:admin')->group(function () {
        Route::get('/categories',          [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create',   [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories',         [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::patch('/categories/{category}',    [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}',   [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // --- Eigen profiel bewerken / updaten / verwijderen ---
    Route::get('/profile',    [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])
         ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
         ->name('profile.destroy');

    // --- Dashboard pagina ---
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');
});
