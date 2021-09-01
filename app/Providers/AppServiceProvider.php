<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use DB;
use App\Models\StoreDetail;

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
        Paginator::useBootstrap();

        Builder::defaultStringLength(191);

        
        View::composer('layouts.web_layout', function($view)
        {   
            $resultsCart = Cart::cartdData();
            return $view->with(['totalItem'=>$resultsCart]);
        });
    }
}
