<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\Environment',
            'App\Repositories\EnvironmentRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\Feature',
            'App\Repositories\FeatureRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\Parameter',
            'App\Repositories\ParameterRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\Strategy',
            'App\Repositories\StrategyRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\User',
            'App\Repositories\UserRepository'
        );
    }
}
