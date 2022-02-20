<?php

namespace App\Providers;

use App\Models\Chart;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //gives access to the number of charts the user has to all blades
        //compose all the views....
        view()->composer('*', function ($view) {
            $countcharts = chart::where('user_id', Auth::user()->id)->count();
            // $userchartIds = chart::where('user_id', Auth::user()->id)->get(['id']);
            $usercharts = chart::where('user_id', Auth::user()->id)->get(['id','chart_name']);


            //...with this variable
            $view->with('countcharts', $countcharts);
            $view->with('usercharts', $usercharts);


        });

        //
    }
}
