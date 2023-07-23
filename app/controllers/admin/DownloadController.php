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
        $total = $this->model->countDownload('download');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $downloads = $this->model->getDownloads($this->lang, $start, $perpage);
        $title = 'Files (digital products)';
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
        $title = 'File added (digital product)';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function deleteAction(): void
    {
        $id = serverMethodGET('id');
        if ($this->model->countDownload('order_download', [$id])) {
            $_SESSION['errors'] = 'Unable to delete this file already purchased';
            redirect();
        }
        if ($this->model->countDownload('product_download', [$id])) {
            $_SESSION['errors'] = 'It is impossible to delete this file attached to the product';
            redirect();
        }
        if ($this->model->downloadDelete($id)) {
            $_SESSION['success'] = 'File deleted';
        } else {
            $_SESSION['errors'] = 'Error deleted file';
        }
        redirect();
    }

}