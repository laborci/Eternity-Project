<?php return [
	'DOMAIN'                             => 'YOUR.PROD.DOMAIN',
	'CONTEXT'                            => (http_response_code() ? 'WEB' : 'CLI'),
	'LANGUAGE'                           => 'hu',
	'TIMEZONE'                           => 'Europe/Budapest',
	'ERROR_LOG'                          => getenv('ROOT') . '/var/log/app.log',
	'DEV_MODE'                           => false,
	'SMARTPAGE-RESPONDER-CLIENT-VERSION' => file_get_contents(getenv('ROOT') . '/var/clientversion')
];