<?php namespace Entity\User;


use Codex\Authentication\AuthenticableInterface;
use Codex\Authentication\AuthenticableRepositoryInterface;
use RedFox\Database\Filter\Filter;

class UserRepository extends \RedFox\Entity\Repository implements AuthenticableRepositoryInterface {

	use Helpers\RepositoryTrait;

	public function authLookup($id): AuthenticableInterface { return $this->search(Filter::where("status='active'")->and('id = $1', $id))->pick(); }
	public function authLoginLookup($login): AuthenticableInterface { return $this->search(Filter::where("status='active'")->and('email = $1', $login))->pick(); }
}