<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Factory\TwigConfigInterface::class)
	->value([
		'cache'   => env('ROOT') . '/var/cache/templates',
		'sources' => [
			'website'  => env('ROOT') . '/Application/HTTP/Site/@template/',
			'admin' => env('ROOT') . '/Application/HTTP/Admin/@template/',
		],
	])
	->env(['debug' => 'dev_mode']);


