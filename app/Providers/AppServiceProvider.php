<?php

namespace App\Providers;

use App\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
         Carbon::setLocale('pl');

         Gate::define('isadmin', function ($user) {
             return $user->hasRole(1);
         });

         //global variable with site settings
         view()->composer('*',function($view) {
            $view->with('siteSettings', Settings::first());
            // if you need to access in controller and views:
            //Config::set('something', $something); 
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
