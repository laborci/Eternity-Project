<?php

use Application\Service\Config;
use Eternity\Factory\AnnotationReaderFactory;
use Eternity\Factory\TwigFactory;
use Eternity\ServiceManager\ServiceContainer;
use Minime\Annotations\Reader;
use RedFox\Database\PDOConnection\AbstractPDOConnection;
use RedFox\Database\PDOConnection\PDOConnectionFactory;
use Symfony\Component\HttpFoundation\Request;

#region AppPDOConnection
class_alias(AbstractPDOConnection::class, \AppPDOConnection::class);
ServiceContainer::shared(\AppPDOConnection::class)->factory(function () {	return PDOConnectionFactory::factory(Config::env()::database(), [ ServiceContainer::get(\Eternity\Logger\LoggerInterface::class), 'sql']);});
#endregion

#region Logger
ServiceContainer::shared(\Eternity\Logger\LoggerInterface::class)->service( env('DEV_MODE') ? \Eternity\Logger\RemoteLog::class : \Eternity\Logger\DummyLogger::class);
ServiceContainer::shared(\Eternity\Logger\ErrorHandlerRegistratorInterface::class)->service( env('DEV_MODE') ? \Eternity\Logger\RemoteLog::class : \Eternity\Logger\DummyLogger::class);
#endregion

#region Configs
ServiceContainer::shared(\Eternity\Logger\RemoteLogConfigInterface::class)->factoryStatic([Config::class, 'remote_log']);
ServiceContainer::shared(\Eternity\Factory\AnnotationReaderConfigInterface::class)->factoryStatic([Config::class, 'annotation_reader']);
ServiceContainer::shared(\Eternity\Factory\TwigConfigInterface::class)->factoryStatic([Config::class, 'twig']);
ServiceContainer::shared(\RedFox\EntityGenerator\EntityGeneratorConfigInterface::class)->factoryStatic([Config::class, 'entity_generator']);
ServiceContainer::shared(\RedFox\Entity\Attachment\AttachmentConfigInterface::class)->factoryStatic([Config::class, 'attachment']);
ServiceContainer::shared(\Eternity\Response\Responder\SmartPageResponderConfigInterface::class)->factoryStatic([Config::class, 'smartpage_responder']);
#endregion

#region Entity Services
ServiceContainer::shared(Request::class)->factoryStatic([Request::class, 'createFromGlobals']);
ServiceContainer::shared(\Twig_Environment::class)->factoryService([TwigFactory::class, 'factory']);
ServiceContainer::shared(Reader::class)->factoryService([AnnotationReaderFactory::class, 'factory']);
#endregion

#region Zuul
ServiceContainer::shared(\Zuul\AuthenticableRepositoryInterface::class)->factoryStatic([\Entity\User\User::class, 'repository']);
ServiceContainer::shared(\Zuul\AuthContainerInterface::class)->service(\Zuul\AuthSessionContainer::class);
#endregion
