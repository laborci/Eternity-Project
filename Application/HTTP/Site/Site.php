<?php namespace Application\HTTP\Site;

use Eternity\Routing\Router;
use RedFox\Entity\Attachment\ThumbnailResponder;

class Site extends \Eternity\Application\WebSite {

	public function route(Router $router) {
		$router->get('/thumbnails/*', ThumbnailResponder::class)();
		$router->get('/', Page\MyPage::class)();
	}

}


