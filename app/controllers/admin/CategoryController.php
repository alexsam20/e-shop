<?php

namespace app\controllers\admin;

class CategoryController extends AppController
{

    public function indexAction()
    {
        $title = 'Categories';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function deleteAction()
    {
        if (!empty(serverMethodGET('id')) && is_numeric(serverMethodGET('id'))) {
            $this->model->delete();
        }
    }

}