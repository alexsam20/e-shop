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
        $s = getMethodGET('s', 's');
        $page = getMethodGET('page');
        $perpage = App::$app::getProperty('pagination');
        $total = $this->model->getCountFindProducts($s, $this->lang);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->getFindProducts($s, $this->lang, $start, $perpage);
        $this->setMeta(___('tpl_search_title'));
        $this->setData(compact('s', 'products', 'pagination', 'total'));
    }
}