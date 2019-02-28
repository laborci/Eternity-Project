<?php namespace Application\HTTP\Admin\Action;

use Application\HTTP\Admin\Form as Form;

class GetMenu extends \Codex\Responder\Menu {
	protected function createMenu() {
		$this->addMenu()
			->addList(...Form\UserFormDescriptor::getMenuArguments())
		;
	}
}
