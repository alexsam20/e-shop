<?php

namespace app\controllers;

use app\models\AppModel;
use shop\Controller;

class AppController extends Controller
{
    public function __construct(array $route = [])
    {
        parent::__construct($route);
        new AppModel();
    }
}