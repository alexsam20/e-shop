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
            print_pre($_SESSION);
            print_pre($this);
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

}