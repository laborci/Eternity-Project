<?php
chdir(__DIR__);

putenv('ROOT='.realpath(__DIR__."/../"));
$env = array_merge( include '../config/global/environment.php', include '../config/local/environment.php');
foreach ($env as $key => $value) putenv(strtoupper($key) . '=' . $value);

date_default_timezone_set(getenv('TIMEZONE'));

include '../vendor/autoload.php';
include '../Application/service_registry.php';

if(getenv('DEV_MODE') && getenv('CONTEXT') === 'WEB'){
	\Symfony\Component\Debug\Debug::enable();
	\Symfony\Component\Debug\ErrorHandler::register();
	\Symfony\Component\Debug\ExceptionHandler::register();
	\Symfony\Component\Debug\DebugClassLoader::enable();
}

Application\Application::Service()->run();

function dump(...$messages){ if(getenv('DEV_MODE')) foreach($messages as $message) \Eternity\Logger\Logger::Service()($message); }