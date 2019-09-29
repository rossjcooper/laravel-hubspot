<?php

namespace Tests\Unit;

use Tests\TestCase;
use Rossjcooper\LaravelHubSpot\HubSpot;

class ServiceProviderTest extends TestCase
{
	public function test_service_provider_bindings() {
		$hubspot = app(HubSpot::class);

		$this->assertInstanceOf(HubSpot::class, $hubspot);
	}
}