<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;


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

         Gate::define('addanimal', function ($user) {
           
            if($user->hasRole(1)) {
                return true;
            }
            return false;
         });

         Gate::define('editanimal', function ($user, $animal) {
           
            if($user->hasRole(1)) {
                return true;
            }

            if($user->id === $animal->user_id) {
                return true;
            }

            return false;
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
