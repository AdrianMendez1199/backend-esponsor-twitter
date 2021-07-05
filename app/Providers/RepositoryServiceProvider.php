<?php

namespace App\Providers;

use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;
use App\Repository\Post\PostRepository;
use App\Repository\Post\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
