<?php

use Application\Config;
use Eternity\Factory\AnnotationReaderConfigInterface;
use Eternity\Factory\AnnotationReaderFactory;
use Eternity\Factory\TwigConfigInterface;
use Eternity\Factory\TwigFactory;
use Eternity\Response\Responder\SmartPageResponderConfigInterface;
use Eternity\ServiceManager\ServiceContainer;
use Minime\Annotations\Reader;
use RedFox\Database\PDOConnection\AbstractPDOConnection;
use RedFox\Database\PDOConnection\PDOConnectionFactory;
use RedFox\Entity\Attachment\AttachmentConfigInterface;
use RedFox\EntityGenerator\EntityGeneratorConfigInterface;
use Symfony\Component\HttpFoundation\Request;


// Register App DB Connection
class_alias(AbstractPDOConnection::class, \AppPDOConnection::class);
ServiceContainer::shared(\AppPDOConnection::class)->factory(function () { return PDOConnectionFactory::factory(Config::env()::database()); });

// --- Framework services ---

// Register Configurations
ServiceContainer::shared(AnnotationReaderConfigInterface::class)->factoryStatic([Config::class, 'annotation_reader']);
ServiceContainer::shared(TwigConfigInterface::class)->factoryStatic([Config::class, 'twig']);
ServiceContainer::shared(EntityGeneratorConfigInterface::class)->factoryStatic([Config::class, 'entity_generator']);
ServiceContainer::shared(AttachmentConfigInterface::class)->factoryStatic([Config::class, 'attachment']);
ServiceContainer::shared(SmartPageResponderConfigInterface::class)->factoryStatic([Config::class, 'smartpage_responder']);

// Register Eternity Services
ServiceContainer::shared(Request::class)->factoryStatic([Request::class, 'createFromGlobals']);
ServiceContainer::shared(\Twig_Environment::class)->factoryService([TwigFactory::class, 'factory']);
ServiceContainer::shared(Reader::class)->factoryService([AnnotationReaderFactory::class, 'factory']);

// Register Zuul Services
ServiceContainer::shared(\Zuul\AuthenticableRepositoryInterface::class)->factoryStatic([\Entity\User\User::class, 'repository']);
ServiceContainer::shared(\Zuul\AuthContainerInterface::class)->service(\Zuul\AuthSessionContainer::class);
