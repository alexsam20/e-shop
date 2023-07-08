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

/**
 * @param string $key Key of GET array
 * @param string $type Values i, f, s
 * @return float|int|string
 */
function serverMethodGET(string $key, $type = 'i'): float|int|string
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if ($type === 'i') {
        return (int)$$param;
    }
    if ($type === 'f') {
        return (float)$$param;
    }

    return trim($$param);
}

/**
 * @param string $key Key of POST array
 * @param string $type Values i, f, s
 * @return float|int|string
 */
function serverMethodPOST(string $key, $type = 's'): float|int|string
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if ($type === 'i') {
        return (int)$$param;
    }
    if ($type === 'f') {
        return (float)$$param;
    }

    return trim($$param);
}
