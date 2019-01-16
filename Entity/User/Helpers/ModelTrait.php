<?php namespace Entity\User\Helpers;
/**
 * px: @property-read \RedFox\Entity\Fields\IdField $id
 * px: @property-read \RedFox\Entity\Fields\StringField $name
 * px: @property-read \RedFox\Entity\Fields\StringField $email
 * px: @property-read \RedFox\Entity\Fields\PasswordField $password
 * px: @property-read \RedFox\Entity\Fields\DateTimeField $created
 * px: @property-read \RedFox\Entity\Fields\SetField $permissions
 * px: @property-read \RedFox\Entity\Fields\EnumField $status

 */
trait ModelTrait{
	private $repositoryInstance = null;
	private $entityShortName = 'User';

	/** @return \Entity\User\UserRepository */
	public function repository(){
		if(is_null($this->repositoryInstance)) $this->repositoryInstance = new \Entity\User\UserRepository($this, ...(include('source.php')));
		return $this->repositoryInstance;
	}

	public function fields():array { return include("fields.php"); }
}