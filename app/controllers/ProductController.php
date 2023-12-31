<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Product;

/** @property Product $model */
class ProductController extends AppController
{
    public function viewAction()
    {
        $product = $this->model->getProduct($this->route['slug'], $this->lang);

        if (!$product) {
            $this->error_404();
            return;
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product['category_id'], $product['title']);

        $imgGallery = $this->model->getGallery($product['id']);
        $this->setMeta($product['title'], $product['description'], $product['keywords'],);
        $this->setData(compact('product', 'imgGallery', 'breadcrumbs'));
    }
}