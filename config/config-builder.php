<?php return [
	'sets'   => [
		'entity-generator'    => include "global/entity-generator.php",
		'attachment'          => include "global/attachment.php",
		'twig'                => include "global/twig.php",
		'smartpage-responder' => include "global/smartpage-responder.php",
		'annotation-reader'   => include "global/annotation-reader.php",
		'remote-log'          => include "global/remote-log.php",
		'env'                 => include "global/env.php",
	],
	'values' => include "global/app-config.php",
];