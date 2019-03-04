<?php namespace Application;

use Application\Cli\CliApp;
use Application\Config;
use Eternity\ConfigBuilder\ConfigBuilder;
use Eternity\Routing\DomainRouter;

class Application extends \Eternity\Application\Application {

	protected function web() {
        
        \Eternity\Logger\RemoteLog::Service();

		$router = DomainRouter::Service();
		$router->launch(HTTP\Website\Site::class, Config::env()::domain());
		$router->launch(HTTP\Admin\Site::class, "admin." . Config::env()::domain());
		$router->launch(HTTP\Website\Site::class, "*." . Config::env()::domain());
	}

	protected function cli() { CliApp::Service()->run();}



}
