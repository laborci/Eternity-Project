<?php namespace Entity\UserLog\Helpers;

/**
 * @method \Entity\UserLog\UserLog pick(int $id, bool $strict = true)
 * @method \Entity\UserLog\UserLog[] collect(array $id_list, bool $strict = true)
 * @method \Entity\UserLog\Helpers\Finder search(\RedFox\Database\Filter\Filter $filter = null)
 */

trait RepositoryTrait {
	/** @return \Entity\UserLog\UserLog */
	protected function createEntity($dto, $repository = null) {
		return new \Entity\UserLog\UserLog($dto, $repository);
	}
}