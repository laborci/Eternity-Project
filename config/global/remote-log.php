<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Logger\RemoteLogConfigInterface::class)
	->env([
		'host' => 'REMOTE_LOG_HOST',
		'port' => 'REMOTE_LOG_PORT',
	]);
