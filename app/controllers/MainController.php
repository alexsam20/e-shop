<?php

namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use shop\App;

/** @property Main $model */
class MainController extends AppController
{
    public function indexAction()
    {
        $lang = App::$app::getProperty('language');
        $slides = R::findAll('slider');
        $products = $this->model->getHits($lang, 6);
        $this->setData(compact('slides', 'products'));
        $this->setMeta("Главная страница", 'description...', 'keywords...');
    }
}
