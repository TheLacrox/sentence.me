<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\ClaseRepositoryInterface',
            'App\Repositories\ClaseRepository'
        );
        $this->app->bind(
            'App\Repositories\TareaRepositoryInterface',
            'App\Repositories\TareaRepository'
        );
        $this->app->bind(
            'App\Repositories\RespuestaRepositoryInterface',
            'App\Repositories\RespuestaRepository'
        );
    }
}
