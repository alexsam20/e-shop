<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Order extends AppModel
{
    public function countOrders($status)
    {
        return R::count('orders', $status);
    }

    public function countOrderProduct($id): int|null
    {
        return R::count('order_product', ' product_id = ' . $id);
    }
    
    public function getOrders($start, $perpage, $status): array
    {
        if ($status) {
            return R::getAll("SELECT * FROM orders WHERE $status ORDER BY id DESC LIMIT $start, $perpage");
        } else {
            return R::getAll("SELECT * FROM orders ORDER BY id DESC LIMIT $start, $perpage");
        }
    }

    public function getOrder($id): array
    {
        return R::getAll("SELECT o.*, op.* FROM orders o JOIN order_product op on o.id = op.order_id WHERE o.id = ?", [$id]);
    }

    public function changeStatus($id, $status): bool
    {
        $status = ($status == 1) ? 1 : 0;
        R::begin();
        try {
            R::exec("UPDATE orders SET status = ? WHERE id = ?", [$status, $id]);
            R::exec("UPDATE order_download SET status = ? WHERE order_id = ?", [$status, $id]);
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }
}