<?php

namespace app\controllers\admin;

use app\models\admin\Download;
use RedBeanPHP\R;
use shop\App;
use shop\Pagination;

/** @property Download $model */
class DownloadController extends AppController
{

    public function indexAction(): void
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

    public function addAction(): void
    {
        if (!empty($_POST)) {
            if ($this->model->downloadValidate()) {
                if ($data = $this->model->uploadFile()) {
                    if ($this->model->saveDownload($data)) {
                        $_SESSION['success'] = 'File added';
                    } else {
                        $_SESSION['errors'] = 'Error added file';
                    }
                } else {
                    $_SESSION['errors'] = 'Error moving file';
                }
            }
            redirect();
        }
        $title = '<strong><i>File added (digital product)</i></strong>';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

}