<?php namespace Entity\User;

use Zuul\AuthenticableInterface;

class User extends \RedFox\Entity\Entity implements Helpers\EntityInterface, AuthenticableInterface {

	use Helpers\EntityTrait;

	public function __toString() { return (string)$this->id; }
	public function getId(): int { return $this->id; }
	public function checkPassword($password): bool { return static::model()->password->check($password, $this->password); }
	public function checkPermission($permission = null): bool { return is_null($permission) || in_array($permission, $this->permissions); }
	public function getAdminAvatar() { return $this->avatar->first ? $this->avatar->first->thumbnail->crop(64, 64)->png : ''; }

}