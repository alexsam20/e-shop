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
    public function __construct(array $route = [])
    {
        parent::__construct($route);
        $model = new AppModel();

        App::$app::setProperty('languages', Language::getLanguages());
        App::$app::setProperty('language', Language::getLanguage(App::$app::getProperty('languages')));

        $lang = App::$app::getProperty('language');
        \shop\Language::loadTranslatePhrase($lang['code'], $this->route);

        $categories = $model->getCategories($lang);



//        $categories = R::getAssoc("SELECT c.*, cd.* FROM category c
//           JOIN category_description cd
//           ON c.id = cd.category_id
//           WHERE cd.language_id = ?", [$lang['id']]);

        App::$app::setProperty("categories_{$lang['code']}", $categories);

        App::$app::setProperty('wishlist', Wishlist::getWishlistIds());
        //print_pre(App::$app::getProperty('wishlist'));
    }
}