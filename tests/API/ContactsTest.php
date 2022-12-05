<?php

namespace Tests\API;

use HubSpot\Discovery\Discovery;
use Tests\TestCase;

class ContactsTest extends TestCase
{
	public function test_get_contacts()
	{
        /** @var Discovery $hubspot */
		$hubspot = app(Discovery::class);

		$response = $hubspot->crm()->contacts()->basicApi()->getPage();
        dd($response);

		$contact = $response->contacts[0];

		$this->assertIsArray($response->contacts);
		// Test we have the default test contact
		$this->assertEquals('Maria', $contact->properties->firstname->value);
		$this->assertEquals('Johnson (Sample Contact)', $contact->properties->lastname->value);
	}
}
