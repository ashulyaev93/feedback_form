<?php

namespace App\Providers;

use App\Infrastructure\Repositories\Feedback\DatabaseFeedbackRepository;
use App\Infrastructure\Repositories\Feedback\DatabaseFeedbackRepository as db;
use App\Infrastructure\Repositories\Feedback\FeedbackRepositoryInterface;
use App\Infrastructure\Repositories\Feedback\FileFeedbackRepository;
use App\Infrastructure\Repositories\Feedback\HybridFeedbackRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Для сохранения и в базу и в документ
        $this->app->singleton(FeedbackRepositoryInterface::class, function ($app) {
            return new HybridFeedbackRepository(
                $app->make(DatabaseFeedbackRepository::class),
                $app->make(FileFeedbackRepository::class)
            );
        });

        //Для гибкого расширения FeedbackRepositoryInterface но с перезаписью в интерфейсе и сохранение в один из имплементирующих классов
        /*$this->app->singleton(FeedbackRepositoryInterface::class, function ($app) {
            if (db::class) {
                return $app->make(DatabaseFeedbackRepository::class);
            } else {
                return $app->make(FileFeedbackRepository::class);
            }
        });*/
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
