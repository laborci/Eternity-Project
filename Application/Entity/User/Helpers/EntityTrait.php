<?php namespace Entity\User\Helpers;
/**
 * @method static \Entity\User\UserRepository repository()
 * @property-read int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property array $permissions
 * @property string $status
 * @property-read \RedFox\Entity\Attachment\AttachmentManager $avatar
 */
trait EntityTrait{

	/** @return \Entity\User\UserModel */
	public static function model() { return \Entity\User\UserModel::instance(\Entity\User\User::class); }
}