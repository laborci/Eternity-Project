<?php namespace Entity\User;

class UserModel extends \RedFox\Entity\Model{

	use Helpers\ModelTrait;

	protected function relations(){}

	protected function attachments(){
		$this->hasAttachmentGroup('images');
	}

	public function setDefaults(User $object){}

}
