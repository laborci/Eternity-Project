<?php namespace Application;

use Application\Cli\CliApp;
use Eternity\Application\Config;
use Eternity\Routing\DomainRouter;

class Application extends \Eternity\Application\Application {

	protected function web() {
		$router = DomainRouter::Service();
		$router->launch(WebSite\Site::class, Config::get('domain'));
		$router->launch(WebAdmin\Site::class, "admin." . Config::get('domain'));
		$router->launch(WebSite\Site::class, "*." . Config::get('domain'));
	}

	protected function cli() { CliApp::Service()->run(); }

}
