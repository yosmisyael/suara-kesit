<?php


use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AllowAuthenticateAdmin;
use App\Http\Middleware\DenyAuthenticatedAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('control-panel')->group(function () {
    Route::prefix('auth')->controller(AdminAuthController::class)->group(function () {
        Route::middleware(DenyAuthenticatedAdmin::class)->group(function () {
            Route::get('/', 'login')->name('admin.auth.login');
            Route::post('/', 'authenticate')->name('admin.auth.authenticate');
        });
        Route::delete('/', 'logout')->middleware(AllowAuthenticateAdmin::class)->name('admin.auth.logout');
    });

    Route::get('/', AdminDashboardController::class)->middleware(AllowAuthenticateAdmin::class)->name('admin.dashboard');
//    Route::get('/', 'index')->name('admin.user.index');
//    Route::get('/create', 'create')->name('admin.user.create');
//    Route::post('/store', 'store')->name('admin.user.store');
//    Route::get('/edit/{id}', 'edit')->name('admin.user.edit');
//    Route::put('/{id}', 'update')->name('admin.user.update');
//    Route::delete('/{id}', 'delete')->name('admin.user.delete');
});

Route::get('/', function () {
    return view('welcome');
});
