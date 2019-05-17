<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        //
=======
        Schema::defaultStringLength(191);
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
        //
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
    }
}
