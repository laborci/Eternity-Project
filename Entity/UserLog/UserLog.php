<?php namespace Entity\UserLog;

class UserLog extends \RedFox\Entity\Entity implements Helpers\EntityInterface {

	use Helpers\EntityTrait;

	public function __toString(){ return (string) $this->id; }

}