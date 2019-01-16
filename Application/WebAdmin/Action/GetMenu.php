<?php namespace Application\WebAdmin\Action;

use Application\WebAdmin\Form\UserFormDescriptor;

class GetMenu extends \Codex\Responder\Menu {
	protected function createMenu() {
		$this->addMenu()
			->addList(...UserFormDescriptor::getMenuArguments())
		;
	}
}
