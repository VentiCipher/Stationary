<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Categories;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            $myvar = Categories::all();
            $user = User::where('roles','seller')->where('dealer_approve','0')->get();
            $view->with('data', ['myvar' => $myvar,'user'=>$user]);
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
