<?php

namespace app\controllers\admin;

use app\models\admin\Download;
use RedBeanPHP\R;
use shop\App;
use shop\Pagination;

/** @property Download $model */
class DownloadController extends AppController
{

    public function indexAction()
    {
        $page = serverMethodGET('page');
        $perpage = 20;
        $total = $this->model->getCountDownload();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $downloads = $this->model->getDownloads($this->lang, $start, $perpage);
        $title = '<strong><i>Files (digital products)</i></strong>';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'downloads', 'pagination', 'total'));
    }

}