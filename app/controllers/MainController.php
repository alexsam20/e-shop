<?php

namespace app\controllers;

use shop\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        print_pre($this->model);
        echo __METHOD__;
    }
}