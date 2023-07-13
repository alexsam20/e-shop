<?php

namespace app\controllers;

use app\models\Wishlist;
use shop\App;

/** @property Wishlist $model */
class WishlistController extends AppController
{

    public function indexAction(): void
    {
        $lang = App::$app::getProperty('language');
        $products = $this->model->getWishlistProducts($lang);
        $this->setMeta(___('wishlist_index_title'));
        $this->setData(compact('products'));
    }

    public function addAction(): void
    {
        $id = serverMethodGET('id');
        if (!$id) {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_add_error')];
            exit(json_encode($answer));
        }

        $product = $this->model->getProduct($id);
        if ($product) {
            $this->model->addToWishlist($id);
            $answer = ['result' => 'success', 'text' => ___('tpl_wishlist_add_success')];
        } else {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_add_error')];
        }
        exit(json_encode($answer));
    }

    public function deleteAction()
    {
        $id = serverMethodGET('id');

        if ($this->model->deleteFromWishlist($id)) {
            $answer = ['result' => 'success', 'text' => ___('tpl_wishlist_delete_success')];
        } else {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_delete_error')];
        }
        exit(json_encode($answer));
    }
}