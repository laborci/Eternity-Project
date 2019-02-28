<?php namespace Application\HTTP\Website\Middleware;


use Application\HTTP\Website\Action\MyAction;
use Eternity\Response\Responder\Middleware;

class MyMiddleware extends Middleware {

	public function run(){
		$this->getDataBag()->set('name', 'Elvis Presley');
		$this->next();
	}

}