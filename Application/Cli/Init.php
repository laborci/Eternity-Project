<?php namespace Application\Cli;

use Entity\User\User;
use Eternity\ServiceManager\ServiceContainer;
use RedFox\Database\PDOConnection\AbstractPDOConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;


class Init extends Command {
	protected function configure() {
		$this
			->setName('init');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		/** @var AbstractPDOConnection $connection */
		$connection = ServiceContainer::get(\AppPDOConnection::class);

		$connection->createSmartAccess()->query("CREATE TABLE `user_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `userId` int(11) unsigned NOT NULL,
  `type` varchar(32) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `description` text COLLATE utf8_hungarian_ci COMMENT 'json',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;");

		$connection->createSmartAccess()->query("CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `password` char(255) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT 'password',
  `permissions` set('admin','super') COLLATE utf8_hungarian_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;" );

		$user = new User();

		$user->name = "Elvis Presley";
		$user->email = "elvis@presley.com";
		$user->password = "vegas";
		$user->permissions = [User::PERMISSIONS_ADMIN];
		$user->status = User::STATUS_ACTIVE;

		$user->save();
	}

}
