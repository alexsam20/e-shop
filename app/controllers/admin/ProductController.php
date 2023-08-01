<?php

namespace app\controllers\admin;

use app\models\admin\Order;
use app\models\admin\Product;
use shop\App;
use shop\Pagination;

/** @property Product $model */
class ProductController extends AppController
{
    public function indexAction(): void
    {
        $page = getMethodGET('page');
        $perpage = 5;
        $total = $this->model->getCountAllProducts();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->model->getProducts($this->lang, $start, $perpage);
        $title = 'Product List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'products', 'pagination', 'total'));
    }

    public function addAction(): void
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

    public function editAction(): void
    {
        $id = getMethodGET('id');
        $lang = $this->lang['id'];

        if (!empty($_POST)) {
            if ($this->model->productValidate()) {
                if ($this->model->updateProduct($id)) {
                    $_SESSION['success'] = 'Product updated';
                } else {
                    $_SESSION['errors'] = 'Error updated product';
                }
            }
            redirect();
        }

        $product = $this->model->getProduct($id);
        if (!$product) {
            throw new \RuntimeException('Not found product', 404);
        }

        $gallery = $this->model->getGallery($id);

        App::$app::setProperty('parent_id', $product[$lang]['category_id']);
        $title = 'Product Editing';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'product', 'gallery', 'lang'));
    }

    public function getDownloadAction(): void
    {
        $q = getMethodGET('q', 's');
        $downloads = $this->model->getDownloads($q);
        echo json_encode($downloads);
        die;
    }

    public function deleteAction(): void
    {
        $id = getMethodGET('id');
        if((new Order)->countOrderProduct($id) > 0) {
            $_SESSION['errors'] = 'Product in orders';
            redirect();
            exit;
        }
        if ($this->model->deleteProduct($id)) {
            $_SESSION['success'] = 'Product deleted. If the product was digital, delete the product file.';
        } else {
            $_SESSION['errors'] = 'Product delete Error';
        }
        redirect();
    }
}
