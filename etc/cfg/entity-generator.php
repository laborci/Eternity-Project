<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\RedFox\EntityGenerator\EntityGeneratorConfigInterface::class)
	->value([
		'path'             => env('ROOT').'Application/Entity/',
		'databases'        => [
			'database' => \AppPDOConnection::class,
		],
		'default_database' => 'database',
	]);
