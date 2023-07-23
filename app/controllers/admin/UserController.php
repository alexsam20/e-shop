<?php

namespace app\controllers\admin;

use app\models\admin\User;
use shop\Pagination;

/** @property User $model */
class UserController extends AppController
{
    public function indexAction()
    {
        $page = serverMethodGET('page');
        $perpage = 20;
        $total = $this->model->countUses();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $users = $this->model->getUsers($start, $perpage);
        $title = 'Users List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'users', 'pagination', 'total'));
    }

    public function viewAction()
    {
        $id = serverMethodGET('id');
        $user = $this->model->getUser($id);
        if (!$user) {
            throw new \RuntimeException('Not found user', 404);
        }

        $page = serverMethodGET('page');
        $perpage = 10;
        $total = $this->model->getCountOrders($id);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders = $this->model->getUserOrders($start, $perpage, $id);
        $title = 'User profile';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'user', 'pagination', 'total', 'orders'));
    }

    public function editAction()
    {
        $id = serverMethodGET('id');
        $user = $this->model->getUser($id);
        $userId = $_SESSION['user']['id'] ?? 'user';
        if (!$user) {
            throw new \RuntimeException('Not found user', 404);
        }

        if (!empty($_POST)) {
            $this->model->loadAttributes();
            if (empty($this->model->attributes['password'])) {
                unset($this->model->attributes['password']);
            }

            if (!$this->model->validate($this->model->attributes) || !$this->model->checkEmail($user)) {
                $this->model->getErrors();
            } else {
                if (!empty($this->model->attributes['password'])) {
                    $this->model->attributes['password'] = $this->model->passwordHash($this->model->attributes['password']);
                }
                if ($this->model->update('user', $id)) {
                    $_SESSION['success'] = 'Profile data updated. If you have updated your data, reboot';
                } else {
                    $_SESSION['errors'] = 'User profile update Error';
                }
            }
            redirect();
        }

        $title = 'Edit user';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'user', 'userId'));
    }

    public function loginAdminAction(): void
    {
        if ($this->model::isAdmin()) {
            redirect(ADMIN);
        }

        $this->layout = 'login';
        if (!empty($_POST)) {
            if ($this->model->login(true)) {
                $_SESSION['success'] = 'You are successfully logged in'; // 'Вы успешно авторизованы'
            } else {
                $_SESSION['errors'] = 'Login or Password entered incorrectly'; // 'Логин/пароль введены неверно'
            }
            if ($this->model::isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
    }

    public function logoutAction(): void
    {
        if ($this->model::isAdmin()) {
            unset($_SESSION['user']);
        }
        redirect(ADMIN . '/user/login-admin');
    }

}