<?php namespace Entity\UserLog\Helpers;
/**
 * @method static \Entity\UserLog\UserLogRepository repository()
 * @property-read int $id
 * @property \DateTime $datetime
 * @property int $userId
 * @property string $type
 * @property array $description
 */
trait EntityTrait{

	/** @return \Entity\UserLog\UserLogModel */
	public static function model() { return \Entity\UserLog\UserLogModel::instance(\Entity\UserLog\UserLog::class); }
}