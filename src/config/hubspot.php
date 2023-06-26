<?php

return [
	/*
	 * Connect to the Hubspot API using a private app access token
	 */
	'access_token' => env('HUBSPOT_ACCESS_TOKEN'),

	/*
	 * Connect to the Hubspot API using a Developer API Key
	 */
	'developer_key' => env('HUBSPOT_DEVELOPER_KEY'),

	/*
	 * Options to enable built in middlewares to handle rate limiting
	 *
	 * @see https://github.com/HubSpot/hubspot-api-php#api-client-comes-with-middleware-for-implementation-of-rate-and-concurrent-limiting
	 */
	'enable_constant_delay' => false,
	'exponential_delay' => null,

	/*
	 * Guzzle Client options that are user for Hubspot API requests
	 *
	 * @see https://docs.guzzlephp.org/en/stable/request-options.html
	 */
	'client_options' => [
		'http_errors' => true,
	],
];
