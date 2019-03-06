<?php namespace Application\HTTP;

use Application\Config;
use Eternity\Routing\DomainRouter;

class App extends \Eternity\Application\WebApp {

	public function route(DomainRouter $domainRouter) {
		$domainRouter->setSuperDomain(Config::env()::domain());

		$domainRouter->launch('', Site\Site::class);
		$domainRouter->launch("admin.", Admin\Site::class);
		$domainRouter->reroute('*', Config::env()::domain());
	}

}
