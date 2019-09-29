<?php

namespace Rossjcooper\LaravelHubSpot\Facades;

use Illuminate\Support\Facades\Facade;

class HubSpot extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'Rossjcooper\LaravelHubSpot\HubSpot';
	}
}
