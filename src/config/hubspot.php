<?php

return [
	/*
	 * Either the API key or the private app access token
	 */
	'api_key' => env('HUBSPOT_API_KEY'),

	/*
	 * Should the library connect via OAuth2 or use the API key. The usage of the API key will be deprecated on
	 * November 30th, 2022.
	 */
	'use_oauth2' => env('HUBSPOT_USE_OAUTH2', false),

	'client_options' => [
		'http_errors' => true,
	],
];
