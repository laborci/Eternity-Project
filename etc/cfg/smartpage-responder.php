<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Response\Responder\SmartPageResponderConfigInterface::class)
	->env([
		'client_version' => 'smartpage-responder-client-version',
		'cache_path' => env('ROOT').'var/cache/output/',
	      ]
	);
