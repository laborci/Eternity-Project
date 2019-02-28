<?php namespace Application\HTTP\WebSite;

use Application\HTTP\Website\Middleware\Cache;
use Application\HTTP\Website\Middleware\Measure;
use Eternity\Routing\Router;
use RedFox\Entity\Attachment\ThumbnailResponder;

class Site extends \Eternity\Application\WebApp {

	public function __construct() {
		// session_start();
	}

	public function run() {
		$router = Router::Service();
		$router->pipe(Measure::class);
		$router->pipe(Cache::class);
		$router->get('/thumbnails/*',ThumbnailResponder::class)();
		$router->get('/')->pipe(Middleware\MyMiddleware::class)->pipe(Page\MyPage::class)();
		$router->get('/json')->pipe(Middleware\MyMiddleware::class)->pipe(Action\MyAction::class)();
	}

}


