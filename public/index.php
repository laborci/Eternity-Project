<?php
chdir(__DIR__);

putenv('ROOT='.realpath(__DIR__."/../"));
$env = array_merge( include '../config/global/@env.php', include '../config/local/@env.php');
foreach ($env as $key => $value) putenv(strtoupper($key) . '=' . $value);

date_default_timezone_set(getenv('TIMEZONE'));

include '../vendor/autoload.php';
include '../Application/service_registry.php';

function dump(...$messages){
	if(getenv('DEV_MODE')) foreach($messages as $message) \Eternity\Logger\RemoteLog::Service()->dump($message);
}

switch (getenv('CONTEXT')){
	case 'CLI': \Application\Cli\App::Service()->run(); break;
	case 'WEB': \Application\HTTP\App::Service()->run(); break;
	default:	echo 'no context';
}