<?php

$cfg = include 'local/config.php';

$config = [];

if (!file_exists(getenv('ROOT') . '/var/clientversion')) {
	file_put_contents(getenv('ROOT') . '/var/clientversion', '1');
}

return [
	'root'                         => getenv('ROOT'),
	'domain'                       => $cfg['domain'],
	'dev-mode'                     => $cfg['dev-mode'],
	'database'                     => $cfg['database.' . getenv('CONTEXT')],
	'entity_generator'             => include 'global/entity-generator.php',
	'attachment'                   => include 'global/attachment.php',
	'twig'                         => include 'global/twig.php',
	'annotationreader'             => include 'global/annotationreader.php',
	'smartresponder-clientversion' => file_get_contents(getenv('ROOT') . '/var/clientversion'),
];
