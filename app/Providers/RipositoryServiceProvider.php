<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RipositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\Eloquent\UserEloquent',
            'App\Http\Repositories\Eloquent\UserRepo',
            'App\Http\Interfaces\Validation\UserValidation',
            'App\Http\Repositories\Validation\UserRepoValidation',
        );
        $this->app->bind(
            'App\Http\Interfaces\Eloquent\CategoryEloquent',
            'App\Http\Repositories\Eloquent\CategoryRepo',
            'App\Http\Interfaces\Validation\CategoryValidation',
            'App\Http\Repositories\Validation\CategoryRepoValidation',
        );
        $this->app->bind(
            'App\Http\Interfaces\Eloquent\ClassificationEloquent',
            'App\Http\Repositories\Eloquent\ClassificationRepo',
            'App\Http\Interfaces\Validation\ClassificationValidation',
            'App\Http\Repositories\Validation\ClassificationRepoValidation',
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
