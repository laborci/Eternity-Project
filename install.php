<?php chdir(__DIR__);
$project = pathinfo(__DIR__)['basename'];

$composer = json_decode(file_get_contents('composer.json'),true);
$composer['name'] = $project;
file_put_contents('composer.json', json_encode($composer, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));


$package = json_decode(file_get_contents('package.json'),true);
$package['name'] = $project;
file_put_contents('package.json', json_encode($package, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));

rename('_gitignore', '.gitignore');

unlink __FILE__;