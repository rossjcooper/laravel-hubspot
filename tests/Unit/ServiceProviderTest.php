<?php

namespace Tests\Unit;

use Rossjcooper\LaravelHubSpot\HubSpot;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
	public function test_service_provider_bindings()
	{
		$hubspot = app(HubSpot::class);

		$this->assertInstanceOf(HubSpot::class, $hubspot);
	}

	public function test_api_key_set()
	{
		$hubspot = app(HubSpot::class);

		$this->assertEquals(env('HUBSPOT_API_KEY'), $hubspot->getClient()->key);
	}
}
