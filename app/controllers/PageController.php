<?php

namespace app\controllers;

use app\models\Page;
use shop\App;

/** @property Page $model */
class PageController extends AppController
{

    public function viewAction()
    {
        $lang = App::$app::getProperty('language');
        $page = $this->model->getPage($this->route['slug'], $lang);

        if (!$page) {
            $this->error_404();
            return;
        }

        $this->setMeta($page['title'], ($page['description'] !== null) ?: '', ($page['keywords'] !== null) ?: '');
        $this->setData(compact('page'));
    }

}
