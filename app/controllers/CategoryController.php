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
        $lang = App::$app::getProperty('language');
        $category = $this->model->getCategory($this->route['slug'], $lang);

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
        //echo  $pagination;

        $products = $this->model->getProducts($ids, $lang, $start, $perpage);
        $this->setMeta($category['title'], $category['description'] ?? 'e-shop', $category['keywords'] ?? 'e-shop, i-shop');
        $this->setData(compact('products', 'category', 'breadcrumbs', 'total', 'pagination'));
    }
}