<?php namespace Application\Service;

use Entity\UserLog\UserLog;
use Zuul\UserLoggerInterface;

class UserLogger implements UserLoggerInterface {

	public function log($userId, $type, $description = null){
		$entry = new UserLog();
		$entry->type = $type;
		$entry->userId = $userId;
		$entry->description = $description;
		$entry->datetime = new \DateTime();
		$entry->save();
	}

}