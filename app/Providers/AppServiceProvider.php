<?php

namespace App\Providers;

use App\Models\Satker;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin',function(Satker $satker){
            return $satker->roles=='superadmin';
        });

        Gate::define('humas_satker',function(Satker $satker){
            return $satker->roles=='humas_satker';
        });

        Gate::define('humas_kanwil',function(Satker $satker){
            return $satker->roles=='humas_kanwil';
        });



    }
}
