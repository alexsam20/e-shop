<?php

namespace app\controllers\admin;

use app\models\admin\Page;
use shop\App;
use shop\Pagination;

/** @property Page $model */
class PageController extends AppController
{

    public function indexAction(): void
    {
        $lang = App::$app::getProperty('language');
        $page = getMethodGET('page');
        $perpage = 20;
        $total = $this->model->countPages();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $pages = $this->model->getPages($lang, $start, $perpage);
        $title = 'Pages List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'pages', 'pagination', 'total'));
    }

    public function deleteAction(): void
    {
        $id = getMethodGET('id');
        if ($this->model->deletePage($id)) {
            $_SESSION['success'] = 'Page deleted';
        } else {
            $_SESSION['errors'] = 'Page delete Error';
        }
        redirect();
    }

    public function addAction(): void
    {
        if (!empty($_POST)) {
            if ($this->model->pageValidate()) {
                if ($this->model->savePage()) {
                    $_SESSION['success'] = 'Page created';
                } else {
                    $_SESSION['errors'] = 'Created page Error';
                }
            }
            redirect();
        }

        $title = 'Create page page';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function editAction(): void
    {
        $id = getMethodGET('id');

        if (!empty($_POST)) {
            if ($this->model->pageValidate()) {
                if ($this->model->updatePage($id)) {
                    $_SESSION['success'] = 'Page saved';
                } else {
                    $_SESSION['errors'] = 'Update page Error';
                }
            }
            redirect();
        }

        $page = $this->model->getPage($id);
        if (!$page) {
            throw new \RuntimeException('Not found page', 404);
        }
        $title = 'Edit page';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'page'));
    }

}