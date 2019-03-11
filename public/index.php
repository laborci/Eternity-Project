<?php include __DIR__.'/../vendor/autoload.php';

(new \Eternity\Application\StartupSequence(__DIR__.'/..'))
	->cli(\Application\Cli\App::class)
	->web()->setDomain(env('DOMAIN'))
	->launch(".", \Application\HTTP\Site\Site::class)
	->launch("admin.", \Application\HTTP\Admin\Site::class)
	->reroute('*.', env('DOMAIN'));