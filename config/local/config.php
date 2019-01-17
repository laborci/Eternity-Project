<?php return [
	'domain'       => '{{$project}}.test',
	'database.WEB' => 'mysql://root:root@mariadb:3306/{{$project}}?charset=utf8',
	'database.CLI' => 'mysql://root:root@127.0.0.1:3306/{{$project}}?charset=utf8',
	'dev-mode'     => true,
];