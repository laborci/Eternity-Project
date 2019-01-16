<?php namespace Application\Cli;

use Application\AppPDOConnection;
use Entity\User\User;
use Eternity\ServiceManager\{Service, SharedService};
use RedFox\Database\Filter\Filter;
use RedFox\Database\MysqlFinder;
use RedFox\Database\Migration\MysqlMigration;
use RedFox\Database\Repository\MysqlRepository;

class CliAppbak extends \Symfony\Component\Console\Application implements SharedService {

	use Service;

	protected $connection;

	public function __construct(AppPDOConnection $connection) {
		$this->connection = $connection;
	}

	public function run() {
		echo "\n- - - - - - - - - - - \n";
//		$finder = new Finder($this->access);
//		$rows = $finder->from('user')->collect();
//		print_r($rows);

//		$migration = new Migration($this->access);

//		$migration->createTable('ttt');
//		$migration->renameTable('ttt', 'asdf');
//		$migration->addField('asdf', 'boss', 'int', '11', false, 1);
//		$migration->changeField('asdf', 'boss', 'pics', 'int', 11, true, null, true, null);

//		$array = [
//			'bool'=>new BoolValue(),
//			'date'=>new DateValue()
//		];
//		$array['bool']->set(1);
//		$array['date']->set(new \DateTime());
//		echo json_encode($array);

		$this->recordtest();


//		date_default_timezone_set('Europe/Budapest');
//
//		echo "------------\n\n";
//
//		$fromjs = '2018-01-01T11:00:00+00:00';
//		echo "from JS : $fromjs\n";
//		$date = new \DateTime($fromjs);
//		$date->setTimezone(new \DateTimeZone(date_default_timezone_get()));
//		echo $date->format('c')."\n";
//		echo $date->format('H:i:s')."\n";
//
//		echo "\n\n";
//		echo "to JS:\n";
//		echo $date->format('c')."\n";
//
//		echo "\n\n";
//		$frommysql = '2018-01-01 12:00:00';
//		echo "from Mysql: $frommysql\n";
//		$date = new \DateTime($frommysql);
//		$date->setTimezone(new \DateTimeZone(date_default_timezone_get()));
//		echo $date->format('c')."\n";
//		echo $date->format('H:i:s')."\n";
//
//
//		echo "\n\n";
//		echo "to MySql:\n";
//		echo $date->format('Y:m:d H:i:s')."\n";
//
//		echo "\n\n";
//		echo "to JS:\n";
//		echo $date->format('c')."\n";
//
//		echo "\n\n";
//		$fromphp = '2018-01-01 12:00:00';
//		echo "from PHP: $fromphp\n";
//		$date = new \DateTime($fromphp);
//		$date->setTimezone(new \DateTimeZone(date_default_timezone_get()));
//		echo $date->format('c')."\n";
//		echo $date->format('H:i:s')."\n";


	}

	function recordtest() {
		//$user = User::repository()->search(Filter::where('name = $1', 'HRLQN'))->pick();
		$user = User::repository()->pick(1);

		/*echo '- created: ' . "\n";
		dump($user->created);//."\n";
		echo '- attributes: ' . "\n";
		dump($user->attributes);//."\n";
		echo '- birthdate: ' . "\n";
		dump($user->birthdate);//."\n";
		echo '- user: ' . "\n";
		dump($user);*/

		array_push($user->boss->attributes, 'd');
		$user->boss->attributes = [];
		$user->boss->attributes[] = 'd';
		$user->boss->attributes[] = 'c';
//		$user->attributes[] = ['d'];
		$user->name = 'ELVIS PRESLEY';

		dump($user);

		$user->boss->save();


		/*
		new Record();

		$var = true;
		$records = $repository->search(
				Filter::where('name=$1', 'elvis')
					->andIf($var, 'id>22')
			)
			->asc('name')
			->collect(10, 30);

		$sql = "SEECT * FROM user WHERE name='elvis' ";
		if($var === true){
			$sql .= ' AND age>22 ';
		}
		$sql = 'ORDER BY name ASC LIMIT 10 OFFSET 30';

		$date = new \DateTime("2019-01-08 21:00:00");
		$datetomysql = $date->format("Y-m-d H:i:s");

*/

	}

}
