<?php

return [
	'DOMAIN'          => 'YOUR.DEV.DOMAIN',
	'DATABASE'        => "mysql://root:root@" . (getenv('CONTEXT') === 'CLI' ? '127.0.0.1' : 'mariadb') . ":3306/YOUR-DATABASE?charset=utf8",
	'DEV_MODE'        => true,
	'REMOTE_LOG_HOST' => 'host.docker.internal',
	'REMOTE_LOG_PORT' => '8881',
];