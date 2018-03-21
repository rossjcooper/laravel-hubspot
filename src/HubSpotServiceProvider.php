<?php

namespace Rossjcooper\LaravelHubSpot;

use Illuminate\Support\ServiceProvider;
use Rossjcooper\LaravelHubSpot\HubSpot;

class HubSpotServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //Bind the HubSpot wrapper class
        $this->app->bind('Rossjcooper\LaravelHubSpot\HubSpot', function ($app) {
            return HubSpot::create(env('HUBSPOT_API_KEY', config('hubspot.api_key')));
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__ . '/config/hubspot.php' => config_path('hubspot.php')
        ], 'config');
    }
}
