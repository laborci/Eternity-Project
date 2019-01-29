<?php

use Application\Config;
use Eternity\Factory\AnnotationReaderFactory;
use Eternity\Factory\TwigFactory;
use Eternity\ServiceManager\ServiceContainer;
use Minime\Annotations\Reader;
use RedFox\Database\PDOConnection\AbstractPDOConnection;
use RedFox\Database\PDOConnection\PDOConnectionFactory;
use Symfony\Component\HttpFoundation\Request;


// Register App DB Connection
class_alias(AbstractPDOConnection::class, \AppPDOConnection::class);
ServiceContainer::bind(\AppPDOConnection::class)->factory(function () { return PDOConnectionFactory::factory(Config::env()::database()); })->shared();

// --- Framework services ---

// Register Configurations
ServiceContainer::bind(\Eternity\Factory\AnnotationReaderConfigInterface::class)->factoryStatic([Config::class, 'annotation_reader'])->shared();
ServiceContainer::bind(\Eternity\Factory\TwigConfigInterface::class)->factoryStatic([Config::class, 'twig'])->shared();
ServiceContainer::bind(\RedFox\EntityGenerator\EntityGeneratorConfigInterface::class)->factoryStatic([Config::class, 'entity_generator'])->shared();
ServiceContainer::bind(\RedFox\Entity\Attachment\AttachmentConfigInterface::class)->factoryStatic([Config::class, 'attachment'])->shared();
ServiceContainer::bind(\Eternity\Response\Responder\SmartPageResponderConfigInterface::class)->factoryStatic([Config::class, 'smartpage_responder'])->shared();

// Register Eternity Services
ServiceContainer::bind(Request::class)->factoryStatic([Request::class, 'createFromGlobals'])->shared();
ServiceContainer::bind(\Twig_Environment::class)->factoryService([TwigFactory::class, 'factory'])->shared();
ServiceContainer::bind(Reader::class)->factoryService([AnnotationReaderFactory::class, 'factory'])->shared();

// Register Zuul Services
ServiceContainer::bind(\Zuul\AuthenticableRepositoryInterface::class)->factoryStatic([\Entity\User\User::class, 'repository'])->shared();
ServiceContainer::bind(\Zuul\AuthContainerInterface::class)->service(\Zuul\AuthSessionContainer::class)->shared();
