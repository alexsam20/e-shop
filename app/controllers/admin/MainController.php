<?php

namespace app\controllers\admin;

class MainController extends AppController
{
    public function indexAction()
    {
        $title = 'Dashboard';
        $this->setMeta('Admin :: Dashboard');
        $this->setData(compact('title'));
    }
}