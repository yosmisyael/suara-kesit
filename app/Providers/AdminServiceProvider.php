<?php

namespace App\Providers;

use App\Services\AdminAuthService;
use App\Services\Impl\AdminAuthServiceImpl;
use App\Services\TokenService;
use App\Services\TokenServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        AdminAuthService::class => AdminAuthServiceImpl::class,
        TokenService::class => TokenServiceImpl::class,
    ];

    public function provides(): array
    {
        return [
            AdminAuthService::class,
            TokenService::class,
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
