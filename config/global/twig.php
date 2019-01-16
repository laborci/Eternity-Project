<?php
return [
	'cache'=>getenv('ROOT').'/var/cache/templates',
	'sources'=>[
		'website'=>getenv('ROOT').'/Application/WebSite/@template/',
		'webadmin'=>getenv('ROOT').'/Application/WebAdmin/@template/',
	]
];