<?php

namespace App\Providers;

use App\Services\Impl\PostServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\Impl\SubmissionServiceImpl;
use App\Services\PostService;
use App\Services\ReviewService;
use App\Services\SubmissionService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PostService::class => PostServiceImpl::class,
        SubmissionService::class => SubmissionServiceImpl::class,
        ReviewService::class => ReviewServiceImpl::class,
    ];

    public function provides(): array
    {
        return [
            PostService::class,
            SubmissionService::class,
            ReviewService::class,
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
