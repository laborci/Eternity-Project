<?php namespace Application\WebSite\Middleware;


use Eternity\Response\Responder\Middleware;

class Measure extends Middleware {

	public function run(){
		$time = microtime(1);
		$this->next();
		dump('runtime: '.(microtime(1)-$time));
	}

}