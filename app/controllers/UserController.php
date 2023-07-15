<?php

namespace app\controllers;

use app\models\User;
use shop\App;
use shop\Pagination;

/** @property User $model */
class UserController extends AppController
{
    public function signupAction(): void
    {
        if (User::checkAuth()) {
            redirect(baseUrl());
        }

        if (!empty($_POST)) {
            $data = $_POST;
            $this->model->loadAttributes($data);
            if (!$this->model->validate($data) || !$this->model->checkUnique()) {
                $this->model->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $this->model->attributes['password'] = $this->model->passwordHash();
                if ($this->model->save('user')) {
                    $_SESSION['success'] = ___('user_signup_success_register');
                } else {
                    $_SESSION['errors'] = ___('user_signup_error_register');
                }
            }
            redirect();
        }

        $this->setMeta(___('tpl_signup'));
    }

    public function loginAction(): void
    {
        if (User::checkAuth()) {
            redirect(baseUrl());
        }

        if (!empty($_POST)) {
            if ($this->model->login()) {
                $_SESSION['success'] = ___('user_login_success_login');
                redirect(baseUrl());
            } else {
                $_SESSION['errors'] = ___('user_login_error_login');
                redirect();
            }
        }

        $this->setMeta(___('tpl_login'));
    }

    public function logoutAction(): void
    {
        if (User::checkAuth()) {
            unset($_SESSION['user']);
        }
        redirect(baseUrl() . 'user/login');
    }

    public function cabinetAction(): void
    {
        if (!User::checkAuth()) {
            redirect(baseUrl() . 'user/login');
        }
        $this->setMeta(___('tpl_cabinet'));
    }

    public function ordersAction(): void
    {
        if (!User::checkAuth()) {
            redirect(baseUrl() . 'user/login');
        }

        $page = serverMethodGET('page');
        $perpage = App::$app::getProperty('pagination');
//        $perpage = 5;
        $total = $this->model->getCountOrders($_SESSION['user']['id']);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders = $this->model->getUserOrders($start, $perpage, $_SESSION['user']['id']);

        $this->setMeta(___('user_orders_title'));
        $this->setData(compact('orders', 'pagination', 'total'));
    }

    public function orderAction(): void
    {
        if (!User::checkAuth()) {
            redirect(baseUrl() . 'user/login');
        }

        $id = serverMethodGET('id');
        $order = $this->model->getUserOrder($id);
        if (!$order) {
            throw new \Exception('Not found order', 404);
        }

        $this->setMeta(___('user_order_title'));
        $this->setData(compact('order'));
    }

    public function filesAction()
    {
        if (!User::checkAuth()) {
            redirect(baseUrl() . 'user/login');
        }

        $lang = App::$app::getProperty('language');
        $page = serverMethodGET('page');
        $perpage = App::$app::getProperty('pagination');
//        $perpage = 1;
        $total = $this->model->getCountFiles();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $files = $this->model->getUserFiles($start, $perpage, $lang);
        $this->setMeta(___('user_files_title'));
        $this->setData(compact('files', 'pagination', 'total'));
    }
}