<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('public.home');
Route::get('/contact', [ContactController::class, 'index'])->name('public.contact');
Route::get('/about', [AboutController::class, 'index'])->name('public.about');
Route::get('/news', [PostController::class, 'index'])->name('public.news');

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/signup', 'register')->name('public.signup');
    Route::post('/signup', 'handleRegister')->name('public.signup.handle');
    Route::get('/login', 'login')->name('public.login');
});
