<?php

namespace app\controllers;

use app\models\User;

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
}