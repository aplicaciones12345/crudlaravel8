<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Esta clase hay que usar para que funcione al paginación con bootstrap
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
