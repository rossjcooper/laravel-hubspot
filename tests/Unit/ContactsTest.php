<?php

namespace Tests\Unit;

use Tests\TestCase;
use Rossjcooper\LaravelHubSpot\HubSpot;

class ContactsTest extends TestCase
{

	public function test_get_contacts()
	{
		$hubspot = app(HubSpot::class);

		$response = $hubspot->contacts()->all();

		$contact = $response->contacts[0];

		$this->assertIsArray($response->contacts);
		// Test we have the default test contact
		$this->assertEquals('Cool', $contact->properties->firstname->value);
		$this->assertEquals('Robot (Sample Contact)', $contact->properties->lastname->value);
	}
}
