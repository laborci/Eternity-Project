<?php namespace Entity\User;
/**
 * Nobody uses this class, it exists only to help the IDE code completion
 * @method \Entity\User\User[] collect($limit = null, $offset = null)
 * @method \Entity\User\User pick()
 */
class Finder extends \RedFox\Database\Finder\AbstractFinder {
	protected function collectRecords($limit = null, $offset = null, &$count = false): array {}
	public function count(): int {}
	protected function buildSQL($doCounting = false): string {}
}