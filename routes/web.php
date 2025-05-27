<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Dit zijn alle routes voor je Laravel 12 Backend Web project.
| - Publieke routes: voor iedereen of niet-ingelogde gebruikers.
| - Authenticated: enkel voor ingelogde gebruikers (middleware 'auth').
| - Admin management: zichtbaarheid via Blade, restrictie in controller of policy.
|
*/

/* ===========================
 * 1. Publieke routes (toegankelijk voor iedereen)
 * ===========================
 */

// Nieuws-overzicht is standaard afgeschermd (auth)
Route::get('/', [NewsController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// Publiek profiel, zonder login
Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.public');

// Contactformulier (formulier tonen & versturen, met MessageController!)
Route::get('/contact', [MessageController::class, 'show'])->name('contact.show');
Route::post('/contact', [MessageController::class, 'send'])->name('contact.send');

// Auth (login/register/wachtwoord vergeten)
require __DIR__ . '/auth.php';

/* ===========================
 * 2. Ingelogde gebruikers (auth)
 * ===========================
 */
Route::middleware('auth')->group(function () {

    // Nieuwsbeheer (CRUD via resource controller, alleen zichtbaar in Blade voor admin)
    Route::resource('news', NewsController::class);

    // FAQ: index en vraag indienen voor iedereen met account
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/ask', [FaqController::class, 'ask'])->name('faqs.ask');
    Route::post('/faqs/ask', [FaqController::class, 'submit'])->name('faqs.submit');

    // FAQ beheer (CRUD, alleen zichtbaar in Blade voor admin)
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::patch('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    // Categoriebeheer (CRUD, alleen zichtbaar in Blade voor admin)
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gebruikersbeheer (alleen admin, zichtbaarheid via Blade)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/{user}/promote', [UserController::class, 'promote'])->name('users.promote');
    Route::post('/users/{user}/demote', [UserController::class, 'demote'])->name('users.demote');

    // Eigen profiel beheren
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Openbare chat functionaliteit
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

    // Contactberichten-overzicht alleen voor admin
    Route::get('/admin/contact-messages', [MessageController::class, 'index'])
        ->name('contact.index');
});
