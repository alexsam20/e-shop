<?php

define("DEBUG", 0);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/core');
define("HELPERS", ROOT . '/vendor/core/helpers');
define("CASHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'ishop');
define("PATH", 'http://e-core');
define("HOME", 'http://localhost:8000');
define("ADMIN", 'http://e-core/admin');
define("NO_IMAGE", '/uploads/no_image.jpg');
define("IMAGE", '/uploads');

require_once ROOT . '/vendor/autoload.php';

