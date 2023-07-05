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
        print_pre($names);
        $this->setMeta('Main Page', 'Description...', 'shop, e-shop, i-shop');
        $this->setData(compact('names'));
    }
}