<?php namespace Application\HTTP\Site\Action;


use Eternity\Response\Responder\JsonResponder;

class MyAction extends JsonResponder {

	protected function respond() {
		return ['a'=>'b', 'b'=>$this->getDataBag()->get('name')];
	}
}

