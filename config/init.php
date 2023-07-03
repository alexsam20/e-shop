<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/shop');
define("HELPERS", ROOT . '/vendor/shop/helpers');
define("CASHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'ishop');
define("PATH", 'http://e-shop');
define("ADMIN", 'http://e-shop/admin');
define("NO_IMAGE", '/uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';

