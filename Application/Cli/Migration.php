<?php namespace App\Cli;


class Migration {

	protected function versions($from, $to){
	}

	/**
	 * @version 1
	 */
	function v1() {
		$user = Table::create('user');
		$user->addField('name', Field::TYPE_VARCHAR, '255');
		$user->addIndex('name', Table::INDEX, 'name');
	}

	/**
	 * version 2
	 */
	function v2(){
		$user = Table::get('user');
		$user->rename('users');
		$user->drop();
	}
}

class Table{

	const INDEX = 'INDEX';
	const INDEX_UNIQUE = 'UNIQUE';
	const INDEX_SPATIAL = 'SPATIAL';
	const INDEX_FULLTEXT = 'FULLTEXT';

	protected $fields;
	protected $name;

	protected function __construct($name) {
		$this->name = $name;
	}

	static function create($name){
		return new static($name);
	}

	static function get($name){
		return new static($name);
	}

	static function drop(){

	}

	public function rename($newName){

	}

	public function addField($name, $type, $length){

	}

	public function addIndex($name, $type, ...$fields){

	}

}

class Field {
	const TYPE_VARCHAR = 'VARCHAR';
	const TYPE_INT = 'INT';
}
