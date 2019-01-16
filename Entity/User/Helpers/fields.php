<?php return [
	'@id' => [\RedFox\Entity\Fields\IdField::class],
	'name' => [\RedFox\Entity\Fields\StringField::class],
	'email' => [\RedFox\Entity\Fields\StringField::class],
	'password' => [\RedFox\Entity\Fields\PasswordField::class],
	'created' => [\RedFox\Entity\Fields\DateTimeField::class],
	'permissions' => [\RedFox\Entity\Fields\SetField::class, ['admin']],
	'status' => [\RedFox\Entity\Fields\EnumField::class, ['active', 'deleted']],
];