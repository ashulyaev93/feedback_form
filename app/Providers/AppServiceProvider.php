<?php

namespace App\Providers;

use App\Infrastructure\Repositories\DatabaseFeedbackRepository;
use App\Infrastructure\Repositories\FeedbackRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FeedbackRepositoryInterface::class, DatabaseFeedbackRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
