<?php

namespace Tests\Unit;

use HubSpot\Discovery\Discovery;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
	public function test_service_provider_bindings()
	{
		$hubspot = app(Discovery::class);

		$this->assertInstanceOf(Discovery::class, $hubspot);
	}

	/** @test */
	public function private_app_access_token_is_set_correctly()
	{
		$apiKey = 'MySecretKey';

		Config::set('hubspot.access_token', $apiKey);

		/** @var Discovery $hubspot */
		$hubspot = app(Discovery::class);

		/*
		 * Use reflection API to access private/protected properties
		 */
		$config = (new \ReflectionObject($hubspot))->getParentClass()->getProperty('config');
		$config->setAccessible(true);

		$accessToken = (new \ReflectionObject($config->getValue($hubspot)))->getProperty('accessToken');
		$accessToken->setAccessible(true);

		$this->assertEquals($apiKey, $accessToken->getValue($config->getValue($hubspot)));
	}

	/** @test */
	public function developer_key_is_set_correctly()
	{
		$devKey = 'MySecretKey';

		Config::set('hubspot.access_token', null);
		Config::set('hubspot.developer_key', $devKey);

		$hubspot = app(Discovery::class);

		$config = (new \ReflectionObject($hubspot))->getParentClass()->getProperty('config');
		$config->setAccessible(true);

		$accessToken = (new \ReflectionObject($config->getValue($hubspot)))->getProperty('developerApiKey');
		$accessToken->setAccessible(true);

		$this->assertEquals($devKey, $accessToken->getValue($config->getValue($hubspot)));
	}
}
