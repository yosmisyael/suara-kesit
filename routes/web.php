<?php


use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Middleware\AllowAuthenticateAdmin;
use App\Http\Middleware\DenyAuthenticatedAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;

Route::prefix('control-panel')->group(function () {
    Route::prefix('auth')->controller(AdminAuthController::class)->group(function () {
        Route::middleware(DenyAuthenticatedAdmin::class)->group(function () {
            Route::get('/', 'login')->name('admin.auth.login');
            Route::post('/', 'authenticate')->name('admin.auth.authenticate');
        });
        Route::delete('/', 'logout')->middleware(AllowAuthenticateAdmin::class)->name('admin.auth.logout');
    });

    Route::get('/', AdminDashboardController::class)->middleware(AllowAuthenticateAdmin::class)->name('admin.dashboard');

    Route::prefix('/user')->group(function () {
        Route::controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('admin.user.index');
            Route::get('/member', 'showMember')->name('admin.user.member');
            Route::get('/author', 'showAuthor')->name('admin.user.author');
            Route::get('/create', 'create')->name('admin.user.create');
            Route::post('/store', 'store')->name('admin.user.store')->middleware(HandlePrecognitiveRequests::class);
            Route::get('/{id}/edit', 'edit')->name('admin.user.edit');
            Route::put('/{id}', 'update')->name('admin.user.update');
            Route::delete('/{id}', 'destroy')->name('admin.user.delete');
        });

        Route::prefix('/application')->controller(AdminAuthorController::class)->group(function () {
            Route::prefix('/token')->group(function () {
                Route::get('/', 'listTokens')->name('admin.application.token');
                Route::get('/generate', 'issueToken')->name('admin.application.token-generate');
            });
            Route::get('/', 'index')->name('admin.application.index');
            Route::get('/{id}', 'show')->name('admin.application.review');
            Route::patch('/{id}/verify', 'handleVerification')->name('admin.application.verification');
        });
    })->middleware(AllowAuthenticateAdmin::class);
});

Route::get('/', function () {
    return view('welcome');
});
