<?php include '../global/environment.php';
include getenv('ROOT').'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

(new Application('Config Builder'))
	->register('Config Builder')
	->setCode(function(InputInterface $input, OutputInterface $output) {


	})
	->getApplication()
	->setDefaultCommand('echo', true) // Single command application
	->run();