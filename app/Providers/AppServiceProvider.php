<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Chart;
use Illuminate\Support\Facades\Auth;

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


        $user_id = Auth::user();
        $id = Auth::id(); 
        $countcharts = chart::where('id', '=', $user_id)->count();
        view()->share('countcharts', $countcharts);
        // view()->share('id', $id);
        view()->share('sd', "hyagvdgsao");

        
        //
    }
}
