<?php namespace Entity\UserLog\Helpers;
/**
 * Nobody uses this class, it exists only to help the IDE code completion
 * @method \Entity\UserLog\UserLog[] collect($limit = null, $offset = null)
 * @method \Entity\UserLog\UserLog[] collectPage($pageSize, $page, &$count = 0)
 * @method \Entity\UserLog\UserLog pick()
 */
class Finder extends \RedFox\Database\Finder\AbstractFinder {
	protected function collectRecords($limit = null, $offset = null, &$count = false): array {}
	public function count(): int {}
	public function buildSQL($doCounting = false): string {}
	public function fetch($fetchmode = \PDO::FETCH_ASSOC): array {}
}