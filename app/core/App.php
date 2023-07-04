<?php

namespace shop;

class App
{
    public static $app;

    public function __construct()
    {
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    protected function getParams(): void
    {
        $params = require CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $name => $value) {
                if (isset($value)) {
                    self::$app->setProperty($name, $value);
                }
            }
        }
    }
}