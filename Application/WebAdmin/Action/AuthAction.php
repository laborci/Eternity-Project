<?php namespace Application\WebAdmin\Action;

use Codex\Authentication\AuthServiceInterface;
use Codex\Authentication\UserLoggerInterface;
use Eternity\Response\Responder\JsonResponder;

class AuthAction extends JsonResponder {

	protected $authService;
	protected $userLog;

	public function __construct(\AdminAuthServiceInterface $authService, \AdminUserLoggerInterface $userLog) {
		$this->authService = $authService;
		$this->userLog = $userLog;
	}

	protected function respond() {
		$method = $this->getArgumentsBag()->get('method');
		switch ($method) {
			case 'login':
				if (!$this->authService->login($this->getRequestBag()->get('login'), $this->getRequestBag()->get('password'), 'admin')) {
					$this->getResponse()->setStatusCode('401');
				} else {
					$this->userLog->log($this->authService->getAuthenticatedId(), UserLoggerInterface::ADMINLOGIN);
				}
				break;
			case 'logout':
				$this->userLog->log($this->authService->getAuthenticatedId(), UserLoggerInterface::ADMINLOGOUT);
				$this->authService->logout();
				break;
		}

	}
}