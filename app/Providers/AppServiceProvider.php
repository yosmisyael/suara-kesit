<?php

namespace App\Providers;

use App\Services\EditorialService;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(EditorialService::class, function ($app) {
            return new EditorialService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
            return null;
        });
    }
}
