<?php

namespace App\Providers;

use App\Repositories\Exercise_DetailsRepository;
use App\Repositories\Exercise_DetailsRepositoryInterface;
use App\Repositories\ExerciseRepository;
use App\Repositories\ExerciseRepositoryInterface;
use App\Repositories\Ingrediant_QuantitesRepositoryInterface;
use App\Repositories\Ingrediants_Quantite_DetailsRepository;
use App\Repositories\Ingrediants_QuantitesRepository;
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
        $this->app->bind(Exercise_DetailsRepositoryInterface::class , Exercise_DetailsRepository::class);
        $this->app->bind(ExerciseRepositoryInterface::class , ExerciseRepository::class);
        $this->app->bind(Ingrediant_QuantitesRepositoryInterface::class , Ingrediants_QuantitesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
