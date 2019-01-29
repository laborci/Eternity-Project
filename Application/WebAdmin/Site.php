<?php namespace Application\WebAdmin;

use Eternity\Routing\Router;
use RedFox\Entity\Attachment\ThumbnailResponder;

/**
 * @domain admin.@
 */
class Site extends \Eternity\Application\WebApp {

	public function __construct() {
		session_start();
	}

	function run() {
		$router = Router::Service();

		$router->post('/login', Action\AuthAction::class, ['method'=>'login'])();

		$router->pipe(Middleware\AuthCheck::class);
		$router->post('/logout', Action\AuthAction::class, ['method'=>'logout'])();

		$router->get('/thumbnails/*', ThumbnailResponder::class)();
		$router->get('/menu', Action\GetMenu::class)();

		$router->get('/', Page\Index::class)();

		$router->get('/get-active-users/get/{ids}', Action\GetActiveUsers::class)();
		$router->get('/get-active-users/{search}', Action\GetActiveUsers::class)();
		$router->get('/get-active-users', Action\GetActiveUsers::class)();

		Form\UserFormDescriptor::createRoutes($router);

	}
}


