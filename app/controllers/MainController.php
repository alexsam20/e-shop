<?php

namespace app\controllers;

use shop\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $names = ['John', 'Alex', 'Michel'];
        $this->setMeta('Main Page', 'Description...', 'shop, e-shop, i-shop');
        $this->setData(compact('names'));
    }
}