<?php

namespace app\controllers;

use app\models\Product;
use shop\App;

/** @property Product $model */
class ProductController extends AppController
{
    public function viewAction()
    {
        $lang = App::$app::getProperty('language');
        $product = $this->model->getProduct($this->route['slug'], $lang);
        //print_pre($product ,1);

        if (!$product) {
            throw new \RuntimeException($this->route['slug'] . ' Not Found', 404);
        }

        $imgGallery = $this->model->getGallery($product['id']);
        $this->setMeta($product['title'], $product['description'], $product['keywords'],);
        $this->setData(compact('product', 'imgGallery'));
    }
}