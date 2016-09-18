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
        //Require our composer autoload.php file
        require __DIR__ . '/../vendor/autoload.php';
        //Bind the HubSpot wrapper class
        $this->app->bind('Rossjcooper\LaravelHubSpot\HubSpot', function ($app) {
            return HubSpot::create(env('HUBSPOT_API_KEY'));
        });
    }
}
