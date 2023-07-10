<?php

namespace app\controllers;

use app\models\Cart;
use shop\App;

/** @property Cart $model */
class CartController extends AppController
{

    public function addAction()
    {
        $lang = App::$app::getProperty('language');
        $id = serverMethodGET('id');
        $qty = serverMethodGET('qty');

        if (!$id) {
            return false;
        }

        $product = $this->model->getProduct($id, $lang);
        if (!$product) {
            return false;
        }

        $this->model->addToCart($product, $qty);
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
        return true;
    }

    public function showAction()
    {
        $this->loadView('cart_modal');
    }

    public function deleteAction()
    {
        $id = serverMethodGET('id');
        if (isset($_SESSION['cart'][$id])) {
            $this->model->deleteItem($id);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction()
    {
        $this->model->clearSession('cart');
        $this->model->clearSession('cart.qty');
        $this->model->clearSession('cart.sum');

        $this->loadView('cart_modal');

        return true;
    }

}