<?php

namespace App\Providers;

use App\Services\AdminAuthService;
use App\Services\AuthorApplicationService;
use App\Services\Impl\AdminAuthServiceImpl;
use App\Services\Impl\AuthorApplicationServiceImpl;
use App\Services\Impl\TokenServiceImpl;
use App\Services\TokenService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        AdminAuthService::class => AdminAuthServiceImpl::class,
        TokenService::class => TokenServiceImpl::class,
        AuthorApplicationService::class => AuthorApplicationServiceImpl::class,
    ];

    public function provides(): array
    {
        return [
            AdminAuthService::class,
            TokenService::class,
            AuthorApplicationService::class
        ];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
