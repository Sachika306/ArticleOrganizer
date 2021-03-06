<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\UrlGenerator; 

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
        // ページネーションのCSSをbootstrapにする
        Paginator::useBootstrap();
        
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
        
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
