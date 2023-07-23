<?php

namespace app\controllers\admin;

use app\models\admin\Order;
use shop\Pagination;

/** @property Order $model */
class OrderController extends AppController
{
    public function indexAction()
    {
        $status = serverMethodGET('status', 's');
        $status = ($status === 'new') ? ' status = 0 ' : '';

        $page = serverMethodGET('page');
        $perpage = 20;
        $total = $this->model->countOrders($status);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orders = $this->model->getOrders($start, $perpage, $status);
        $title = 'Orders List';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title', 'orders', 'pagination', 'total'));
    }
}