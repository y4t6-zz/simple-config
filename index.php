<?php

require_once 'config.php';

$config = [];
$pathToConfigFolder = $_SERVER['DOCUMENT_ROOT'] . '/Config/';

$config['main'] = Config::file('main', $pathToConfigFolder);
$config['database'] = Config::file('database', $pathToConfigFolder);
$config['host'] = Config::item('host', 'database', $pathToConfigFolder);

print_r($config);