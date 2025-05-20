<?php
// app/Providers/AppServiceProvider.php

namespace App\Providers;

use App\Repositories\DatabaseTodoRepository;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TodoRepositoryInterface::class, function ($app) {
            return new DatabaseTodoRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}