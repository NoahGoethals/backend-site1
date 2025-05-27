<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hier definieer je alle web-routes van je applicatie.
| Publieke pagina’s, ingelogde routes en admin-only management zijn gescheiden.
|
*/

// === Publieke routes ===

// Startpagina (nieuws overzicht) — alleen voor ingelogde gebruikers
Route::get('/', [NewsController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// Publieke profielpagina (zonder login)
Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.public');

// Authenticatie-routes (login, register, wachtwoord reset, etc.)
require __DIR__ . '/auth.php';

// === Authenticated (ingelogde) routes ===
Route::middleware('auth')->group(function () {

    // Nieuws — alleen admins mogen toevoegen/bewerken/verwijderen via de Blade
    Route::resource('news', NewsController::class);

    // FAQ — index en vragen indienen voor alle ingelogde users
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/ask',  [FaqController::class, 'ask'])->name('faqs.ask');
    Route::post('/faqs/ask', [FaqController::class, 'submit'])->name('faqs.submit');
    // CRUD FAQ alleen zichtbaar/mogelijk voor admin via Blade
    Route::get('/faqs/create',     [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs',           [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::patch('/faqs/{faq}',    [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}',   [FaqController::class, 'destroy'])->name('faqs.destroy');

    // Categorieënbeheer (alleen zichtbaar/mogelijk voor admin via Blade)
    Route::get('/categories',               [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create',        [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories',              [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}',  [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gebruikersbeheer — alleen admin
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/promote', [UserController::class, 'promote'])->name('users.promote');
    Route::post('/users/{user}/demote', [UserController::class, 'demote'])->name('users.demote');

    // Profiel — bewerken, updaten, verwijderen (voor ingelogde user zelf)
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
