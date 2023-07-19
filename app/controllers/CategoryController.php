<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use shop\App;
use shop\Pagination;

/** @property Category $model */
class CategoryController extends AppController
{
    public function viewAction(): void
    {
        $category = $this->model->getCategory($this->route['slug'], $this->lang);

        if (!$category) {
            $this->error_404();
            return;
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category['id']);
        $ids = $this->model->getIds($category['id']);
        $ids = !$ids ? $category['id'] : $ids . $category['id'];

        $page = serverMethodGET('page');
        $perpage = App::$app::getProperty('pagination');
        $total = $this->model->getCountProducts($ids);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->getProducts($ids, $this->lang, $start, $perpage);
        $this->setMeta($category['title'], $category['description'], $category['keywords']);
        $this->setData(compact('products', 'category', 'breadcrumbs', 'total', 'pagination'));
    }
}