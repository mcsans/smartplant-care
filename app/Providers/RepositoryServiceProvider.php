<?php

namespace App\Providers;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\BaseRepositoryContract;
use App\Http\Repositories\Contracts\MasterData\PlantCategoryContract;
use App\Http\Repositories\Contracts\MasterData\PlantContract;
use App\Http\Repositories\Contracts\SensorContract;
use App\Http\Repositories\MasterData\PlantCategoryRepository;
use App\Http\Repositories\MasterData\PlantRepository;
use App\Http\Repositories\SensorRepository;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseRepositoryContract::class, BaseRepository::class);
        $this->app->bind(PlantCategoryContract::class, PlantCategoryRepository::class);
        $this->app->bind(PlantContract::class, PlantRepository::class);
        $this->app->bind(SensorContract::class, SensorRepository::class);
    }
}
