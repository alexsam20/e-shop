<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use shop\App;
use shop\Pagination;

/** @property Product $model */
class ProductController extends AppController
{
    public function indexAction()
    {
        //$lang = App::$app::getProperty('language');
        $page = serverMethodGET('page');
        $perpage = 3;
        $total = $this->model->getCountAllProducts();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->getProducts($this->lang, $start, $perpage);
        $title = 'Product List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'products', 'pagination', 'total'));
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->productValidate()) {
                if ($this->model->saveProduct()) {
                    $_SESSION['success'] = 'Product created.';
                } else {
                    $_SESSION['errors'] = 'Error created product';
                }
            }
            redirect();
        }

        $title = 'New Product';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    /**
     * @throws \JsonException
     */
    public function getDownloadAction()
    {
        $q = serverMethodGET('q', 's');
        $downloads = $this->model->getDownloads($q);
        echo json_encode($downloads);
        die;
    }
}
