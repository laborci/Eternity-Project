<?php namespace Application\HTTP;

use Eternity\Application\WebApp;

class App extends WebApp {

	public function run() {
		$this->domainRouter
			->setDomain(env('DOMAIN'))
			->launch(".", \Application\HTTP\Site\Site::class)
			->launch("admin.", \Application\HTTP\Admin\Site::class)
			->reroute('*.', env('DOMAIN'));
	}

}