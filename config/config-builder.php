<?php return [
	'sets'   => [
		'entity-generator'    => ['value'     => include "global/entity-generator.php",
		                          'interface' => \RedFox\EntityGenerator\EntityGeneratorConfigInterface::class],
		'attachment'          => ['value'     => include "global/attachment.php",
		                          'interface' => \RedFox\Entity\Attachment\AttachmentConfigInterface::class],
		'twig'                => ['value'     => include "global/twig.php",
		                          'env'       => ['debug' => 'dev_mode'],
		                          'interface' => \Eternity\Factory\TwigConfigInterface::class],
		'smartpage-responder' => ['env'       => ['client_version' => 'smartpage-responder-client-version'],
		                          'interface' => \Eternity\Response\Responder\SmartPageResponderConfigInterface::class],
		'annotation-reader'   => ['value'     => include "global/annotation-reader.php",
		                          'interface' => \Eternity\Factory\AnnotationReaderConfigInterface::class],
		'remote-log'          => ['env'       => ['host' => 'REMOTE_LOG_HOST', 'port' => 'REMOTE_LOG_PORT'],
		                          'interface' => \Eternity\Logger\RemoteLogConfigInterface::class],
		'env'                 => ['env' => ['root', 'domain', 'context', 'language', 'timezone', 'error_log', 'dev_mode', 'database']],

	],
	'values' => include "global/app-config.php",
];