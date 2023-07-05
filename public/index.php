<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Need php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/function.php';
require_once CONFIG . '/routes.php';

new \shop\App();

//print_pre(\shop\Router::getRoutes());

//var_dump($a);
//throw new Exception('Fuck It\'s ERROR :-(');
//echo $test;
//var_dump( \shop\App::$app->getProperty('site_name'));
//var_dump(\shop\App::$app->getProperties());
