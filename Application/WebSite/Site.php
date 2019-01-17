<?php namespace Application\WebSite;

use Application\WebSite\Middleware\Cache;
use Application\WebSite\Middleware\MeasureMiddleware;
use Eternity\Routing\Router;
use RedFox\Entity\Attachment\ThumbnailResponder;

class Site extends \Eternity\Application\WebApp {

	public function run() {
		$router = Router::Service();
		$router->pipe(MeasureMiddleware::class);
		$router->pipe(Cache::class);
		$router->get('/thumbnails/*',ThumbnailResponder::class)();
		$router->get('/')->pipe(Middleware\MyMiddleware::class)->pipe(Page\MyPage::class)();
		$router->get('/json')->pipe(Middleware\MyMiddleware::class)->pipe(Action\MyAction::class)();
	}

}