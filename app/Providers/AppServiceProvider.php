<?php

namespace App\Providers;

use App\Helpers\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
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
        // breadcrumb macro
        Request::macro(
            'breadcrumbs',
            fn () => new Breadcrumbs($this)
        );
    }
}
