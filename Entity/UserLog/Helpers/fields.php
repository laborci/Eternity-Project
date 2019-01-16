<?php return [
	'@id' => [\RedFox\Entity\Fields\IdField::class],
	'datetime' => [\RedFox\Entity\Fields\DateTimeField::class],
	'userId' => [\RedFox\Entity\Fields\IdField::class],
	'event' => [\RedFox\Entity\Fields\StringField::class],
	'description' => [\RedFox\Entity\Fields\JsonStringField::class],
];