<?php
return [
	'cache'=>getenv('ROOT').'/var/cache/templates',
	'sources'=>[
		'website'=>getenv('ROOT').'/Application/HTTP/Website/@template/',
		'admin'=>getenv('ROOT').'/Application/HTTP/Admin/@template/',
	]
];