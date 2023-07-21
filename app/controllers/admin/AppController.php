<?php

namespace app\controllers\admin;


use app\models\admin\User;
use app\models\AppModel;
use app\widgets\language\Language;
use shop\App;
use shop\Controller;

class AppController extends Controller
{
    public false|string $layout = 'admin';

    public array $lang;

    public function __construct(array $route = [])
    {
        parent::__construct($route);

        if (!User::isAdmin() && $route['action'] !== 'login-admin') {
            redirect(ADMIN . '/user/login-admin');
        }
        $model = new AppModel();

        App::$app::setProperty('languages', Language::getLanguages());
        App::$app::setProperty('language', Language::getLanguage(App::$app::getProperty('languages')));

        $this->lang = App::$app::getProperty('language');
        \shop\Language::loadTranslatePhrase($this->lang['code'], $this->route);

        $categories = $model->getCategories($this->lang);
        App::$app::setProperty("categories_{$this->lang['code']}", $categories);

        new AppModel();
        App::$app::setProperty('languages', Language::getLanguages());
        App::$app::setProperty('language', Language::getLanguage(App::$app::getProperty('languages')));
    }

}