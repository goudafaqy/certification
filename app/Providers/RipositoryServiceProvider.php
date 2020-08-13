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
            'App\Http\Interfaces\Eloquent\RoleEloquent',
            'App\Http\Repositories\Eloquent\RoleRepo',
            'App\Http\Interfaces\Validation\RoleValidation',
            'App\Http\Repositories\Validation\RoleRepoValidation',
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
        $this->app->bind(
            'App\Http\Interfaces\Eloquent\CourseEloquent',
            'App\Http\Repositories\Eloquent\CourseRepo',
            'App\Http\Interfaces\Validation\CourseValidation',
            'App\Http\Repositories\Validation\CourseRepoValidation',
        );
        $this->app->bind(
            'App\Http\Interfaces\Eloquent\CourseAppointmentEloquent',
            'App\Http\Repositories\Eloquent\CourseAppointmentRepo',
            'App\Http\Interfaces\Validation\CourseAppointmentValidation',
            'App\Http\Repositories\Validation\CourseAppointmentRepoValidation',
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
