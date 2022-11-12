<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
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

	public function test_oauth2_client_is_built()
	{
		Config::set('hubspot.use_oauth2', true);
		Config::set('hubspot.api_key', 'FooBarBaz');

		$hubspot = app(HubSpot::class);

		$this->assertEquals(env('HUBSPOT_API_KEY'), $hubspot->getClient()->key);
		$this->assertTrue($hubspot->getClient()->oauth2);
	}
}
