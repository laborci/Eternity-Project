<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\RedFox\EntityGenerator\EntityGeneratorConfigInterface::class)
	->value([
		'path'             => 'Entity/',
		'databases'        => [
			'database' => \AppPDOConnection::class,
		],
		'default_database' => 'database',
	]);
