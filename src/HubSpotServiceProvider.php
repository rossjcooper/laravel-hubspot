<?php

namespace Rossjcooper\LaravelHubSpot;

use Illuminate\Support\ServiceProvider;
use SevenShores\Hubspot\Delay;
use SevenShores\Hubspot\RetryMiddlewareFactory;

class HubSpotServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        //Bind the HubSpot wrapper class
        $this->app->bind('Rossjcooper\LaravelHubSpot\HubSpot', function ($app) {
            $handlerStack = \GuzzleHttp\HandlerStack::create();
            $handlerStack->push(
                RetryMiddlewareFactory::createRateLimitMiddleware(
                    Delay::getConstantDelayFunction()
                )
            );

            $handlerStack->push(
                RetryMiddlewareFactory::createInternalErrorsMiddleware(
                    Delay::getExponentialDelayFunction(2)
                )
            );

            $guzzleClient = new \GuzzleHttp\Client(['handler' => $handlerStack]);

            // BC fix
            if (!config('hubspot.key')) {
                config(['hubspot.key' => config('hubspot.api_key')]);
            }

            $httpClient = new \SevenShores\Hubspot\Http\Client(
                config('hubspot'),
                $guzzleClient,
                config('hubspot.client_options', []),
            );

            return HubSpot::create(
                env('HUBSPOT_API_KEY', config('hubspot.api_key')),
                $httpClient
            );
        });
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__ . '/config/hubspot.php' => config_path('hubspot.php'),
        ], 'config');
    }
}
