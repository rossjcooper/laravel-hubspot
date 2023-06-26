<?php

namespace Rossjcooper\LaravelHubSpot;

use GuzzleHttp\Client;
use HubSpot\Discovery\Discovery;
use HubSpot\Factory;
use Illuminate\Support\ServiceProvider;

class HubSpotServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->includeConfig();

		$this->app->bind(Discovery::class, function ($app) {
			$this->includeConfig();

			$this->mergeConfigFrom(
				__DIR__.'/config/hubspot.php',
				'hubspot'
			);

			$handlerStack = \GuzzleHttp\HandlerStack::create();

			if (config('hubspot.enable_constant_delay')) {
				$handlerStack->push(
					\HubSpot\RetryMiddlewareFactory::createRateLimitMiddleware(
						\HubSpot\Delay::getConstantDelayFunction()
					)
				);
			}

			if ($exponentialDelay = config('hubspot.exponential_delay')) {
				$handlerStack->push(
					\HubSpot\RetryMiddlewareFactory::createRateLimitMiddleware(
						\HubSpot\Delay::getExponentialDelayFunction($exponentialDelay)
					)
				);
			}

			$client = new Client(array_merge(
				config('hubspot.client_options'),
				[
					'handler' => $handlerStack,
				]
			));

			if ($accessToken = config('hubspot.access_token')) {
				return Factory::createWithAccessToken(
					$accessToken,
					$client,
				);
			}

			return Factory::createWithDeveloperApiKey(
				config('hubspot.developer_key'),
				$client,
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

	protected function includeConfig(): void
	{
		$this->mergeConfigFrom(
			__DIR__.'/config/hubspot.php',
			'hubspot'
		);
	}
}
