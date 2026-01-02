<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('public.home');
Route::get('/contact', [\App\Http\Controllers\Public\ContactController::class, 'index'])->name('public.contact');
Route::get('/about', [\App\Http\Controllers\Public\AboutController::class, 'index'])->name('public.about');
Route::get('/news', [PostController::class, 'index'])->name('public.news');
