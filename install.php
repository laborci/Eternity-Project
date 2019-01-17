<?php

$project = basename(__DIR__);
$root = __DIR__;

/** COMPOSER **/

$composerfile = $root.'/composer.json';
$composer = json_decode(file_get_contents($composerfile), true);
$composer['name'] = $project;
$composer = json_encode($composer, JSON_PRETTY_PRINT);

//print_r($composer);
file_put_contents($composerfile, $composer);

/** PACKAGE **/
$packagefile = $root.'/package.json';
$package = json_decode(file_get_contents($packagefile), true);
$package['name'] = $project;
$package['author'] = '';
$package = json_encode($package, JSON_PRETTY_PRINT);

//print_r($package);
file_put_contents($packagefile, $package);

/** COFIG **/

$configfile = $root.'/config/local/config.php';
$config = file_get_contents($configfile);
$config = str_replace('{{$project}}', $project, $config);

//print_r($config);
file_put_contents($configfile, $config);

/** VIRTUALHOST **/

$virtualhostfile = $root.'/config/local/virtualhost.conf';
$virtualhost = file_get_contents($virtualhostfile);
$virtualhost = str_replace('{{$project}}', $project, $virtualhost);
$virtualhost = str_replace('{{$root}}', $root, $virtualhost);

//print_r($virtualhost);
file_put_contents($virtualhostfile, $virtualhost);

unlink(__FILE__);
