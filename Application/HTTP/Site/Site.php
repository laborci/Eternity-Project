<?php namespace Application\HTTP\Site;

use Application\HTTP\Site\Middleware\Cache;
use Application\HTTP\Site\Middleware\Measure;
use Eternity\Routing\Router;
use MikAuthEternity\MikAuthCheckMiddleware;
use MikAuthEternity\MikAuthRedirect;
use RedFox\Entity\Attachment\ThumbnailResponder;

class Site extends \Eternity\Application\WebSite {

	public function route(Router $router) {

		$router->get('/thumbnails/*', ThumbnailResponder::class)();
		$router->post('/', Page\MyPage::class)();
	}

}


