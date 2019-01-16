<?php namespace Entity\User;

use Codex\Authentication\AuthenticableInterface;

class User extends \RedFox\Entity\Entity implements Helpers\EntityInterface, AuthenticableInterface {

	use Helpers\EntityTrait;

	public function __toString() { return (string)$this->id; }

	public function getId(): int { return $this->id; }
	public function checkPassword($password): bool {
		$result = static::model()->password->check($password, $this->password);
		dump($result);
		return $result;
	}
	public function checkPermission($permission = null): bool {
		$result = is_null($permission) || in_array($permission, $this->permissions);
		return $result;
	}

	public function getAdminAvatar() { return $this->images->first ? $this->images->first->thumbnail->crop(64, 64)->png : ''; }

}