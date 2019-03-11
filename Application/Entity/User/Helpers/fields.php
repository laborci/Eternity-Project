<?php return [
	'@id' => [\RedFox\Entity\Fields\IdField::class],
	'name' => [\RedFox\Entity\Fields\StringField::class],
	'email' => [\RedFox\Entity\Fields\StringField::class],
	'password' => [\RedFox\Entity\Fields\PasswordField::class],
	'permissions' => [\RedFox\Entity\Fields\SetField::class, ['admin', 'super']],
	'status' => [\RedFox\Entity\Fields\EnumField::class, ['active', 'inactive']],
];