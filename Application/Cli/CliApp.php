<?php namespace Application\Cli;

use Eternity\Cli\{BuildConfig, ClientVersion, NodeChanges, GenerateVhost};
use Eternity\ServiceManager\{Service, SharedService};
use RedFox\Cli\{CreateEntity, UpdateEntities};

class CliApp implements SharedService {

	use Service;

	protected $application;

	public function __construct() {
		$this->application = new \Symfony\Component\Console\Application('plx', '1');

		$this->application->add(new CreateEntity());
		$this->application->add(new UpdateEntities());
		$this->application->add(new NodeChanges());
		$this->application->add(new ClientVersion());
		$this->application->add(new Test());
		$this->application->add(new BuildConfig());
		$this->application->add(new GenerateVhost());
	}

	public function run() {
		$this->application->run();
	}

}
