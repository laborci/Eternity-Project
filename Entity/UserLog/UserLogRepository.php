<?php namespace Entity\UserLog;


use Codex\Authentication\UserLoggerInterface;

class UserLogRepository extends \RedFox\Entity\Repository implements UserLoggerInterface {

	use Helpers\RepositoryTrait;


	const WWWLOGIN = 'www-login';
	const WWWAUTOLOGIN = 'www-autologin';
	const REGISTER = 'register';
	const ACCEPTTERMS = 'accept-terms';

	protected $allowedTypes = [
		'admin-login',
		'admin-logout',
		'www-login',
		'www-autologin',
		'register',
		'accept-terms'
	];

	public function log($userId, $event, $description = null){
		if(!in_array($event, $this->allowedTypes)) trigger_error('User Log Type does not exists '.$event, E_USER_ERROR);
		$entry = new UserLog();
		$entry->event = $event;
		$entry->userId = $userId;
		$entry->description = $description;
		$entry->datetime = new \DateTime();
		$entry->save();
	}

}