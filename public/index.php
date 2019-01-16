<?php
chdir(__DIR__);
include '../config/global/environment.php';

date_default_timezone_set(getenv('TIMEZONE'));

include '../vendor/autoload.php';
include getenv('SERVICE_REGISTRY');

if(\Eternity\Application\Config::get('dev-mode') && getenv('CONTEXT') === 'WEB'){
	\Symfony\Component\Debug\Debug::enable();
	\Symfony\Component\Debug\ErrorHandler::register();
	\Symfony\Component\Debug\ExceptionHandler::register();
	\Symfony\Component\Debug\DebugClassLoader::enable();
}

Application\Application::Service()->run();

function dump(...$messages){ if(\Eternity\Application\Config::get('dev-mode')) foreach($messages as $message) \Eternity\Logger\Logger::Service()($message); }