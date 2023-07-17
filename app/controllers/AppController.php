<?php

namespace app\controllers;

use app\models\AppModel;
use app\models\Wishlist;
use app\widgets\language\Language;
use RedBeanPHP\R;
use shop\App;
use shop\Controller;

class AppController extends Controller
{
    public array $lang;

    public function __construct(array $route = [])
    {
        parent::__construct($route);
        $model = new AppModel();

        App::$app::setProperty('languages', Language::getLanguages());
        App::$app::setProperty('language', Language::getLanguage(App::$app::getProperty('languages')));

        $this->lang = App::$app::getProperty('language');
        \shop\Language::loadTranslatePhrase($this->lang['code'], $this->route);

        $categories = $model->getCategories($this->lang);

        App::$app::setProperty("categories_{$this->lang['code']}", $categories);

        App::$app::setProperty('wishlist', Wishlist::getWishlistIds());
    }
}