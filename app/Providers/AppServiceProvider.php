<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind services or interfaces here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fix MySQL key length issues (especially for older MySQL versions)
        Schema::defaultStringLength(100);

        // Use Bootstrap 5 for pagination
        Paginator::useBootstrapFive();

        // Share the logged-in user session globally with all views (optional but useful)
        View::composer('*', function ($view) {
            $view->with('sessionUser', Session::get('user'));
        });
    }
}
