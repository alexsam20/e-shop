<?php

define("ROOT", dirname(__DIR__));
const ADMIN = 'http://localhost:8000/admin';
const APP = ROOT . '/app';
const CACHE = ROOT . '/tmp/cache';
const CONFIG = ROOT . '/config';
const COOKIE_TIME = 3600 * 24 * 7 * 30; // 1 month
const CORE = ROOT . '/app/core';
const DEBUG = 0;
const HELPERS = ROOT . '/app/core/helpers';
const HOME = 'http://localhost:8000';
const IMAGE = '/uploads';
const LOGS = ROOT . '/tmp/logs';
const LAYOUT = 'ishop';
const NO_IMAGE = '/uploads/images/no_image.jpg';
const PATH = HOME;
const PRODUCT_GALLERY = '/uploads/images/';
const SLIDER_PATH = '/uploads/slider/';
const WWW = ROOT . '/public';

require_once ROOT . '/vendor/autoload.php';

