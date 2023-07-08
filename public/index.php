<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Need php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/function.php';
require_once CONFIG . '/routes.php';

new \shop\App();
