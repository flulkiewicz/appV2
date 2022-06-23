<?php

namespace App\Providers;

use App\Repository\PalRepository;
use App\Repository\TaskRepository;
use App\Repository\IPalRepository;
use App\Repository\ITaskRepository;
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
            IPalRepository::class,
            PalRepository::class
        );
        $this->app->bind(
            ITaskRepository::class,
            TaskRepository::class
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
