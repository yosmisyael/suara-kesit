<?php


use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminSubmissionController;
use App\Http\Controllers\AdminTokenController;
use App\Http\Controllers\AdminUserConsoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ImageController;
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
    Route::middleware(AllowAuthenticateAdmin::class)->group(function () {
        Route::get('/', AdminDashboardController::class)->name('admin.dashboard');
        Route::prefix('user')->group(function () {
            Route::get('/', AdminUserConsoleController::class)->name('admin.user.index');
            Route::get('member', AdminMemberController::class)->name('admin.user.member');
            Route::get('author', AdminAuthorController::class)->name('admin.user.author');
            Route::controller(AdminUserController::class)->group(function () {
                Route::get('create', 'create')->name('admin.user.create');
                Route::post('store', 'store')->name('admin.user.store')->middleware(HandlePrecognitiveRequests::class);
                Route::get('{id}/edit', 'edit')->name('admin.user.edit');
                Route::put('{id}', 'update')->name('admin.user.update');
                Route::delete('{id}', 'destroy')->name('admin.user.delete');
            });
            Route::prefix('token')->controller(AdminTokenController::class)->group(function () {
                Route::get('/', 'index')->name('admin.token.index');
                Route::get('generate', 'store')->name('admin.token.store');
            });
            Route::prefix('application')->controller(AdminApplicationController::class)->group(function () {
                Route::get('/', 'index')->name('admin.application.index');
                Route::get('{id}', 'edit')->name('admin.application.edit');
                Route::patch('{id}/verify', 'verify')->name('admin.application.verify');
            });
        });
        Route::prefix('post')->controller(AdminPostController::class)->group(function () {
            Route::get('/', 'index')->name('admin.post.index');
            Route::get('{id}/edit', 'edit')->name('admin.post.edit');
            Route::patch('{id}', 'update')->name('admin.post.update');
            Route::delete('{id}', 'destroy')->name('admin.post.delete');
            Route::prefix('submission')->group(function () {
                Route::get('/', AdminSubmissionController::class)->name('admin.submission.index');
                Route::prefix('{id}/review')->controller(AdminReviewController::class)->group(function () {
                    Route::get('/', 'show')->name('admin.review.show');
                    Route::get('create', 'create')->name('admin.review.create');
                    Route::post('/', 'store')->name('admin.review.store');
                });
            });
        });
        Route::prefix('attachment')->controller(ImageController::class)->group(function () {
            Route::post('upload', 'store')->name('admin.attachment.store');
            Route::delete('delete', 'delete')->name('admin.attachment.delete');
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
