<?php

namespace App\Providers;

use App\Services\Venue4sqService;
use App\Services\VenueService;
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
        $this->app->bind(VenueService::class, Venue4sqService::class);
    }
}
