<?php

namespace app\controllers\admin;

use app\models\admin\Category;
use shop\App;

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
                if ($this->model->saveCategory()) {
                    $_SESSION['success'] = 'Category saved';
                } else {
                    $_SESSION['errors'] = 'Error!';
                }
            }
            redirect();
        }
        $title = 'New category.';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function editAction()
    {
        $id = serverMethodGET('id');
        if (!empty($_POST)) {
            if ($this->model->categoryValidate()) {
                if ($this->model->updateCategory($id)) {
                    $_SESSION['success'] = 'Category updated.';
                } else {
                    $_SESSION['errors'] = 'Error!';
                }
            }
            redirect();
        }
        $category = $this->model->getCategory($id);
        if (!$category) {
            throw new \RuntimeException('Not found category', 404);
        }

        App::$app::setProperty('parent_id', $category[$this->lang['id']]['parent_id']);
        $title = 'Edit Category';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'category'));
    }

}