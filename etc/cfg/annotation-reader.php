<?php return (new \Eternity\ConfigBuilder\ConfigSegment())
	->interface(\Eternity\Factory\AnnotationReaderConfigInterface::class)
	->value(['cache'=>env('ROOT').'/var/cache/annotations/']);