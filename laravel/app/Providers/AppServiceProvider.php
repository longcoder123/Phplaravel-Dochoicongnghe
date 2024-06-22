<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\cart;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * 
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('',function($view){
            $view->with([
                'cart'=> new cart()
            ]);
        });
    }
    
}
