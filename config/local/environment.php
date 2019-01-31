<?php 

return [
	'DOMAIN'   => 'YOUR.DEV.DOMAIN',
	'DATABASE' => "mysql://root:root@".(getenv('CONTEXT') === 'CLI' ? '127.0.0.1' : 'mariadb' ).":3306/YOUR-DATABASE?charset=utf8",
	'DEV_MODE' => true,
];