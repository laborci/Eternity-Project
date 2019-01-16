<?php namespace Application\WebAdmin\Page;

use Eternity\Response\Responder\SmartPageResponder;

/**
 * @css /dist/admin/style.css
 * @js  /dist/admin/app.js
 * @title Admin
 * @template "@webadmin/Index.twig"
 */
class Index extends SmartPageResponder{


	protected $authService;
	protected $authRepository;
	protected $user;

	public function __construct(\AdminAuthServiceInterface $authService, \AdminAuthenticableRepositoryInterface $authRepository) {
		parent::__construct();
		$this->authService = $authService;
		$this->authRepository = $authRepository;
	}

	function prepare() {
		$user = $this->authRepository->authLookup($this->authService->getAuthenticatedId());
		dump($user);
		$this->getDataBag()->set('user', $user);
	}

}