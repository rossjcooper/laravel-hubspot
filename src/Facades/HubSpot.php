<?php

namespace Rossjcooper\LaravelHubSpot\Facades;

use HubSpot\Discovery\Discovery;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \HubSpot\Discovery\Auth\Discovery auth()
 * @method static \HubSpot\Discovery\Automation\Discovery automation()
 * @method static \HubSpot\Discovery\Cms\Discovery cms()
 * @method static \HubSpot\Discovery\Conversations\Discovery conversations()
 * @method static \HubSpot\Discovery\CommunicationPreferences\Discovery communicationPreferences()
 * @method static \HubSpot\Discovery\Crm\Discovery crm()
 * @method static \HubSpot\Discovery\Events\Discovery events()
 * @method static \HubSpot\Discovery\Files\Discovery files()
 * @method static \HubSpot\Discovery\Marketing\Discovery marketing()
 * @method static \HubSpot\Discovery\Settings\Discovery settings()
 * @method static \HubSpot\Discovery\Webhooks\Discovery webhooks()
 */
class HubSpot extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return Discovery::class;
	}
}
