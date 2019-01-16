<?php include '../global/environment.php';

$cfg = include __DIR__.'/builder-config.php';

$configfile = file_get_contents(__DIR__.'/config.php');

$configfile = str_replace('{{$domain}}', $cfg['domain'], $configfile);
$configfile = str_replace('{{$database.WEB}}', $cfg['database.WEB'], $configfile);
$configfile = str_replace('{{$database.CLI}}', $cfg['database.CLI'], $configfile);

file_put_contents(__DIR__.'/config.php', $configfile);


$virtualhostfile = file_get_contents(__DIR__.'/virtualhost.conf');
$virtualhostfile = str_replace('{{$domain}}', $cfg['domain'], $virtualhostfile);
$virtualhostfile = str_replace('{{$path}}', getenv('ROOT'), $virtualhostfile);

file_put_contents(__DIR__.'/virtualhost.conf', $virtualhostfile);

unlink( __DIR__.'/builder-config.php');
unlink( __DIR__.'/build.php');
