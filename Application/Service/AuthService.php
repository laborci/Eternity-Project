<?php namespace Application\Service;

use Entity\User\User;
use Eternity\ServiceManager\Service;

class AuthService extends \Zuul\AuthService {

	use Service;

	public function getAuthenticated():User { return User::repository()->pick($this->container->getUserId()); }
}
