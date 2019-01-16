<?php namespace Entity\UserLog\Helpers;
/**
 * px: @property-read \RedFox\Entity\Fields\IdField $id
 * px: @property-read \RedFox\Entity\Fields\DateTimeField $datetime
 * px: @property-read \RedFox\Entity\Fields\IdField $userId
 * px: @property-read \RedFox\Entity\Fields\StringField $event
 * px: @property-read \RedFox\Entity\Fields\JsonStringField $description

 */
trait ModelTrait{
	private $repositoryInstance = null;
	private $entityShortName = 'UserLog';

	/** @return \Entity\UserLog\UserLogRepository */
	public function repository(){
		if(is_null($this->repositoryInstance)) $this->repositoryInstance = new \Entity\UserLog\UserLogRepository($this, ...(include('source.php')));
		return $this->repositoryInstance;
	}

	public function fields():array { return include("fields.php"); }
}