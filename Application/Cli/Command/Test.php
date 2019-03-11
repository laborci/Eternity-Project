<?php namespace Application\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command {

	protected function configure() {
		$this
			->setName('test');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$values = [];
		$inifiles = ['env.sys.cfg','env.local.cfg'];
		foreach ($inifiles as $inifile) {
			$ini = parse_ini_file(env('ROOT') . '/etc/env/'.$inifile, true, INI_SCANNER_RAW);

			foreach ($ini as $key => $value) {
				if(is_array($value)) {
					$topkey = null;
					$ctx = substr($key, -4);
					if ($ctx === '@CLI' || $ctx === '@WEB') {
						if (
								(CONTEXT_CLI && $ctx === '@CLI') ||
								(CONTEXT_WEB && $ctx === '@WEB')
						) $topkey = substr($key, 0, -4);
					} else {
						$topkey = $key;
					}

					if(!is_null($topkey)){
						foreach ($value as $subkey=>$subvalue){
							$ini[$topkey.'.'.$subkey] = $subvalue;
						}
					}

					unset($ini[$key]);
				}
			}


			foreach ($ini as $key => $value) {
				$ctx = substr($key, -4);
				if ($ctx === '@CLI' || $ctx === '@WEB') {
					$key = substr($key, 0, -4);
					if (CONTEXT_CLI && $ctx === '@CLI')
						$values[ $key ] = $value;
					if (CONTEXT_WEB && $ctx === '@WEB')
						$values[ $key ] = $value;
				} else {
					$values[ $key ] = $value;
				}
			}
		}


		do {
			$found = false;
			foreach ($values as $key => $value) {
				$re = '/\$\{(.*?)\}/m';
				preg_match_all($re, $value, $matches, PREG_SET_ORDER, 0);
				foreach ($matches as $match) {
					$found = true;
					echo $match[0];
					$replace = '';
					if (array_key_exists($match[ 1 ], $values))
						$replace = $values[ $match[ 1 ] ];
					if (env($match[ 1 ]))
						$replace = env($match[ 1 ]);
					$values[ $key ] = str_replace($match[ 0 ], $replace, $values[ $key ]);
				}
			}
		}while($found === true);

		print_r($values);

	}

}
