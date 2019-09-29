<?php

namespace Rossjcooper\LaravelHubSpot;

use Illuminate\Support\ServiceProvider;

class HubSpotServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 */
	public function register()
	{
		//Bind the HubSpot wrapper class
		$this->app->bind('Rossjcooper\LaravelHubSpot\HubSpot', function ($app) {
			return HubSpot::create(
				env('HUBSPOT_API_KEY', config('hubspot.api_key')),
				null,
				config('hubspot.client_options', [])
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
			__DIR__.'/config/hubspot.php' => config_path('hubspot.php'),
		], 'config');
	}
}
