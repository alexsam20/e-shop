<?php

namespace app\controllers\admin;

use app\models\admin\Category;

/** @property Category $model */
class CategoryController extends AppController
{

    public function indexAction(): void
    {
        $title = 'Categories';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function deleteAction(): void
    {
        if (!empty(serverMethodGET('id')) && is_numeric(serverMethodGET('id'))) {
            $this->model->delete();
        }
    }

    public function addAction(): void
    {
        if (!empty($_POST)) {
            if ($this->model->categoryValidate()) {
                $_SESSION['success'] = 'Category saved';
            } else {

            }
            redirect();
        }
        $title = 'New category.';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

}