<?php

namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use shop\Controller;

/** @property Main $model */
class MainController extends Controller
{
    public function indexAction()
    {
        $names = $this->model->getNames();
        $oneName = R::getRow('SELECT * FROM `name` WHERE `id` = 2');

        $this->setMeta('Main Page', 'Description...', 'shop, e-shop, i-shop');
        $this->setData(compact('names'));
    }
}
