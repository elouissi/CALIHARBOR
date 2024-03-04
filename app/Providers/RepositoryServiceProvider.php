<?php

namespace App\Providers;

use App\Repositories\SeanceRepository;
use App\Repositories\SeanceRepositoryInterface;
use App\Repositories\SkillRepository;
use App\Repositories\SkillRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\VilleRepository;
use App\Repositories\VilleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
        $this->app->bind(VilleRepositoryInterface::class , VilleRepository::class);
        $this->app->bind(SkillRepositoryInterface::class , SkillRepository::class);
        $this->app->bind(SeanceRepositoryInterface::class , SeanceRepository::class);
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
