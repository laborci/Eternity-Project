<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Factory\TwigConfigInterface::class)
	->value([
		'cache'   => getenv('ROOT') . '/var/cache/templates',
		'sources' => [
			'website'  => getenv('ROOT') . '/Application/HTTP/site/@template/',
			'webadmin' => getenv('ROOT') . '/Application/HTTP/admin/@template/',
		],
	])
	->env(['debug' => 'dev_mode']);


