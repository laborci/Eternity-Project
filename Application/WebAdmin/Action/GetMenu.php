<?php namespace Application\WebAdmin\Action;

use Application\WebAdmin\Form as Form;

class GetMenu extends \Codex\Responder\Menu {
	protected function createMenu() {
		$this->addMenu()
			->addList(...Form\UserFormDescriptor::getMenuArguments())
			->addList(...Form\BlogFormDescriptor::getMenuArguments())
			->addList(...Form\ArticleFormDescriptor::getMenuArguments())
		;
	}
}
