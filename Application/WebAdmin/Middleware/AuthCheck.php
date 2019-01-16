<?php namespace Application\WebAdmin\Middleware;


use Application\WebAdmin\Page\Login;
use Eternity\Response\Responder\Middleware;

class AuthCheck extends Middleware {

	protected $authService;

	public function __construct(\AdminAuthServiceInterface $authService) {
		$this->authService = $authService;
	}

	protected function run() {

		if (!$this->authService->isAuthenticated() || !$this->authService->checkPermission('admin')) {
			$this->authService->logout();
			$this->break(Login::class);
		}

		$this->next();
	}

}
