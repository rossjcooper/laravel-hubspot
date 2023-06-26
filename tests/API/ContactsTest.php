<?php

namespace Tests\API;

use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectWithAssociations;
use HubSpot\Discovery\Discovery;
use Tests\TestCase;

class ContactsTest extends TestCase
{
	public function test_get_contacts()
	{
		/** @var Discovery $hubspot */
		$hubspot = app(Discovery::class);

		$response = $hubspot->crm()->contacts()->basicApi()->getPage();

		$this->assertIsArray($response->getResults());

		// Test we have the default test contact
		/** @var SimplePublicObjectWithAssociations $contact */
		$contact = $response->getResults()[0];
		$this->assertEquals('Maria', $contact->getProperties()['firstname']);
	}
}
