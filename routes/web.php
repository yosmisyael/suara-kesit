<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController;
use App\Livewire\UserDashboard;
use App\Livewire\UserPostCreate;
use App\Livewire\UserPostEdit;
use App\Livewire\UserPostList;
use App\Livewire\UserPostOverview;
use App\Livewire\UserSettings;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('public.home');
Route::get('/contact', [ContactController::class, 'index'])->name('public.contact');
Route::get('/about', [AboutController::class, 'index'])->name('public.about');

Route::controller(PostController::class)->group(function () {
    Route::get('/news', 'index')->name('public.news.search');
    Route::get('/news/{slug}', 'show')->name('public.news.show');
    Route::get('/news/{slug}', 'getByCategory')->name('public.news.category');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/signup', 'register')->name('public.signup');
        Route::post('/signup', 'handleRegister')->name('public.signup.handle');
        Route::get('/login', 'login')->name('public.login');
        Route::post('/login', 'handleLogin')->name('public.login.handle');
    });
    Route::delete('/logout', 'handleLogout')->middleware('authenticated')->name('user.logout');
});

Route::middleware('authenticated')->group(function () {

    Route::prefix('/user')->group(function () {
        Route::get('/dashboard', UserDashboard::class)->name('user.dashboard');
        Route::get('/settings', UserSettings::class)->name('user.settings');

        // Post Resources
        Route::prefix('/posts')->group(function () {
            Route::get('/', UserPostOverview::class)->name('user.post');
            Route::get('/create', UserPostCreate::class)->name('user.post.create');
            Route::get('/list', UserPostList::class)->name('user.post.list');
            Route::get('/{postId}', UserPostEdit::class)->name('user.post.edit');
        });
    });

    // Attachment Resources
    Route::prefix('/attachments')->controller(AttachmentController::class)->group(function () {
        Route::post('/', 'store')->name('attachment.store');
        Route::delete('/{attachmentId}', 'destroy')->name('attachment.destroy');
    });
});
