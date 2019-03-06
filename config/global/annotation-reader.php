<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Factory\AnnotationReaderConfigInterface::class)
	->value(['cache'=>getenv('ROOT').'/var/cache/annotations/']);