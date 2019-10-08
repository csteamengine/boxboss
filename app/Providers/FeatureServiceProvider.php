<?php

namespace App\Providers;

use App;
use App\Models\Feature;
use Illuminate\Support\ServiceProvider;

class FeatureServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('feature', function()
        {
            return new Feature();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
