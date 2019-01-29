<?php namespace Application;

use Application\Cli\CliApp;
use Application\Config;
use Eternity\ConfigBuilder\ConfigBuilder;
use Eternity\Routing\DomainRouter;

class Application extends \Eternity\Application\Application {

	protected function web() {

		$router = DomainRouter::Service();
		$router->launch(WebSite\Site::class, Config::env()::domain());
		$router->launch(WebAdmin\Site::class, "admin." . Config::env()::domain());
		$router->launch(WebSite\Site::class, "*." . Config::env()::domain());
	}

	protected function cli() { CliApp::Service()->run();}



}
