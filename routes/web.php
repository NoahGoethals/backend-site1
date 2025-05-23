<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;

Route::get('/', [NewsController::class, 'index']);

Route::resource('news', NewsController::class);

Route::resource('faqs', FaqController::class)->middleware('auth');
