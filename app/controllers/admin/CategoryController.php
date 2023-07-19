<?php

namespace app\controllers\admin;

use app\models\Category;

class CategoryController extends AppController
{

    public function indexAction()
    {
        $title = 'Categories';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

}