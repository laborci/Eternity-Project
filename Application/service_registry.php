<?php

use Codex\Authentication\AuthService;
use Eternity\Application\Config;
use Eternity\Factory\AnnotationReaderFactory;
use Eternity\Factory\TwigFactory;
use Eternity\ServiceManager\ServiceContainer;
use Minime\Annotations\Reader;
use RedFox\Database\PDOConnection\AbstractPDOConnection;
use RedFox\Database\PDOConnection\PDOConnectionFactory;
use Symfony\Component\HttpFoundation\Request;

ServiceContainer::bind(Request::class)->factory(function (): Request { return Request::createFromGlobals(); })->shared();
ServiceContainer::bind(\Twig_Environment::class)->factory([ TwigFactory::class, 'factory' ])->shared();
ServiceContainer::bind(Reader::class)->factory([ AnnotationReaderFactory::class, 'factory' ]);

class_alias(AbstractPDOConnection::class, \AppPDOConnection::class);
ServiceContainer::bind(\AppPDOConnection::class)->factory(function () { return PDOConnectionFactory::factory(Config::get('database')); })->shared();

class_alias(\Codex\Authentication\AuthServiceInterface::class, \AdminAuthServiceInterface::class);
ServiceContainer::bind(\AdminAuthServiceInterface::class)->service(AuthService::class)->shared();

class_alias(\Codex\Authentication\UserLoggerInterface::class, \AdminUserLoggerInterface::class);
ServiceContainer::bind(\AdminUserLoggerInterface::class)->factory(function(){return \Entity\UserLog\UserLog::repository();})->shared();

class_alias(\Codex\Authentication\AuthenticableRepositoryInterface::class, \AdminAuthenticableRepositoryInterface::class);
ServiceContainer::bind(\AdminAuthenticableRepositoryInterface::class)->factory(function(){return \Entity\User\User::repository();})->shared();
ServiceContainer::bind(\Codex\Authentication\AuthenticableRepositoryInterface::class)->factory(function(){return \Entity\User\User::repository();})->shared();

ServiceContainer::bind(\Codex\Authentication\AuthContainerInterface::class)->service(\Codex\Authentication\AuthSessionContainer::class)->shared();


