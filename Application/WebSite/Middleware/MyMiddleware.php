<?php namespace Application\WebSite\Middleware;


use Application\WebSite\Action\MyAction;
use Eternity\Response\Responder\Middleware;

class MyMiddleware extends Middleware {

	public function run(){
		$this->getDataBag()->set('name', 'Elvis Presley');
		$this->next();
	}

}