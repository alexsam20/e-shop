<?php

namespace app\controllers\admin;

use app\models\admin\Order;
use shop\Pagination;

/** @property Order $model */
class OrderController extends AppController
{
    public function indexAction(): void
    {
        $status = getMethodGET('status', 's');
        $status = ($status === 'new') ? ' status = 0 ' : '';

        $page = getMethodGET('page');
        $perpage = 20;
        $total = $this->model->countOrders($status);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders = $this->model->getOrders($start, $perpage, $status);
        $title = 'Orders List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'orders', 'pagination', 'total'));
    }

    public function editAction(): void
    {
        $id = getMethodGET('id');

        if (isset($_GET['status'])) {
            $status = getMethodGET('status');
            if ($this->model->changeStatus($id, $status)) {
                $_SESSION['success'] = 'Order status changed';
            } else {
                $_SESSION['errors'] = 'Order status change Error';
            }
        }

        $order = $this->model->getOrder($id);
        if (!$order) {
            throw new \RuntimeException('Not found order', 404);
        }
        $title = "Order # {$id}";
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'order'));
    }
}