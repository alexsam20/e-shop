<?php

function print_pre($var, $exit = false)
{
    echo '<pre>' . print_r($var, 1) . '</pre>';
    if ($exit) {
        die();
    }
}

function redirect($http = false): void
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function baseUrl(): string
{
    return PATH . '/' . (\shop\App::$app::getProperty('lang') ? \shop\App::$app::getProperty('lang') . '/' : '');
}
