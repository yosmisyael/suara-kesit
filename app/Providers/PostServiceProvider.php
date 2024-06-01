<?php

namespace App\Providers;

use App\Services\Impl\PostServiceImpl;
use App\Services\PostService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PostService::class => PostServiceImpl::class,
    ];

    public function provides(): array
    {
        return [
            PostService::class
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
