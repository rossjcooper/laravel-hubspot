<?php

namespace Tests\API;

use Rossjcooper\LaravelHubSpot\HubSpot;
use Tests\TestCase;

class ContactsTest extends TestCase
{
	public function test_get_contacts()
	{
		$hubspot = app(HubSpot::class);

		$response = $hubspot->contacts()->all();

		$contact = $response->contacts[0];

		$this->assertIsArray($response->contacts);
		// Test we have the default test contact
		$this->assertEquals('Maria', $contact->properties->firstname->value);
		$this->assertEquals('Johnson (Sample Contact)', $contact->properties->lastname->value);
	}
}
