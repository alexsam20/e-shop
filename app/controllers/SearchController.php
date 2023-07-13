<?php

namespace app\controllers;

use app\models\Search;
use shop\App;
use shop\Pagination;

/** @property Search $model */
class SearchController extends AppController
{
    public function indexAction()
    {
        $s = serverMethodGET('s', 's');
        $lang = App::$app::getProperty('language');
        $page = serverMethodGET('page');
        $perpage = App::$app::getProperty('pagination');
        $total = $this->model->getCountFindProducts($s, $lang);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->getFindProducts($s, $lang, $start, $perpage);
        $this->setMeta(___('tpl_search_title'));
        $this->setData(compact('s', 'products', 'pagination', 'total'));
    }
}