<?php

namespace app\controllers\admin;

use app\models\admin\User;

/** @property User $model */
class UserController extends AppController
{

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