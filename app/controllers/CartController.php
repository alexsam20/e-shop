<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;
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

    public function viewAction(): void
    {
        $this->setMeta(___('tpl_cart_title'));
    }

    public function checkoutAction(): void
    {
        if (!empty($_POST)) {
            // registration user, if not registration
            if (!User::checkAuth()) {
                $user = new User();
                $data = $_POST;
                $user->loadAttributes($data);
                if (!$user->validate($data) || !$user->checkUnique()) {
                    $user->getErrors();
                    $_SESSION['form_data'] = $data;
                    redirect();
                } else {
                    $user->attributes['password'] = $user->passwordHash();
                    if (!$user_id = $user->save('user')) {
                        $_SESSION['errors'] = ___('cart_checkout_error_register');
                        redirect();
                    }
                }
            }
            // Save order
            $data['user_id'] = $user_id ?? $_SESSION['user']['id'];
            $data['note'] = serverMethodPOST('note');
            $user_email = $_SESSION['user']['email'] ?? serverMethodPOST('email');

            if (!$order_id = Order::saveOrder($data)) {
                $_SESSION['errors'] = ___('cart_checkout_error_save_order');
            } else {
                Order::mailOrder($order_id, $user_email, 'mail_order_user');
                Order::mailOrder($order_id, App::$app::getProperty('admin_email'), 'mail_order_admin');
                unset($_SESSION['cart'], $_SESSION['cart.sum'], $_SESSION['cart.qty']);
                $_SESSION['success'] = ___('cart_checkout_order_success');
            }
        }
        redirect();
    }
}