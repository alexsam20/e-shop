<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\widgets\language\Language;
use shop\App;
use shop\Controller;

class AppController extends Controller
{
    public false|string $layout = 'admin';

    public function __construct(array $route = [])
    {
        parent::__construct($route);
        new AppModel();
        App::$app::setProperty('languages', Language::getLanguages());
        App::$app::setProperty('language', Language::getLanguage(App::$app::getProperty('languages')));
    }

}