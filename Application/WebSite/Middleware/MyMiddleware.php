<?php namespace Application\WebSite\Middleware;


use Application\WebSite\Action\MyAction;
use Eternity\Response\Responder\Middleware;

class MyMiddleware extends Middleware {

	public function run(){
		dump('futok');
		$this->getDataBag()->set('name', 'Elvis Presley');
		$this->next();
		dump('na lássuk');
		return;
	}

}