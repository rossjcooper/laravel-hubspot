<?php

namespace Tests\Unit\Facades;

use HubSpot\Discovery\Discovery;
use Rossjcooper\LaravelHubSpot\Facades\HubSpot;
use Tests\TestCase;

class HubspotFacadeTest extends TestCase
{
	/** @test */
	public function hubspot_facade()
	{
		$this->assertInstanceOf(Discovery::class, HubSpot::getFacadeRoot());
	}
}
