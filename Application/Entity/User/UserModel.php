<?php namespace Entity\User;

class UserModel extends \RedFox\Entity\Model{

	use Helpers\ModelTrait;

	protected function relations(){}

	protected function attachments(){
		$this->hasAttachmentGroup('avatar')
			->acceptExtensions('jpg', 'png')
			->maxFileCount(1)
			->maxFileSize(800 * 1024);
	}

	public function setDefaults(User $object){}

}
