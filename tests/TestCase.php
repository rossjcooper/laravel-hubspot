<?php

namespace Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as OrchTestCase;
use Rossjcooper\LaravelHubSpot\HubSpotServiceProvider;

abstract class TestCase extends OrchTestCase
{
	/**
	 * Load our ServiceProvider.
	 */
	protected function getPackageProviders($app)
	{
		return [HubSpotServiceProvider::class];
	}

	/**
	 * Loads in our package .env file.
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app->useEnvironmentPath(__DIR__.'/..');
		$app->bootstrapWith([LoadEnvironmentVariables::class]);
		parent::getEnvironmentSetUp($app);
	}
}
