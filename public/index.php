<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Need php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';

new \shop\App();

//echo '<pre>';
//var_dump($a);
//throw new Exception('Fuck It\'s ERROR :-(');
//echo $test;
//var_dump( \shop\App::$app->getProperty('site_name'));
//var_dump(\shop\App::$app->getProperties());
