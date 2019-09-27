<?php

namespace Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as OrchTestCase;

abstract class TestCase extends OrchTestCase
{
	/**
	 * Loads in our package .env file
	 *
	 * @param [type] $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app->useEnvironmentPath(__DIR__ . '/..');
		$app->bootstrapWith([LoadEnvironmentVariables::class]);
		parent::getEnvironmentSetUp($app);
	}
}
