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
            print_pre($data);
            print_pre($this->model->attributes);
        }

        $this->setMeta(___('tpl_signup'));
    }

}