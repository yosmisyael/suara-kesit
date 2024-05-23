<?php

namespace App\Providers;

use App\Services\Impl\UserAuthServiceImpl;
use App\Services\UserAuthService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserAuthService::class => UserAuthServiceImpl::class,
    ];

    public function provides()
    {
        return [
            UserAuthService::class,
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
