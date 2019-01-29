<?php namespace Application\Cli;

use Entity\User\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;


class Test extends Command {
	protected function configure() {
		$this
			->setName('test');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$user = User::repository()->pick(1);
		$user->password = 'vegas';
		$user->save();
	}

}
