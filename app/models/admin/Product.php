<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Product extends AppModel
{
    public function getCountAllProducts(): int
    {
        return R::count('product');
    }

    public function getProducts($lang, $start, $perpage): array
    {
        return R::getAll("SELECT p.*, pd.title FROM product p 
           JOIN product_description pd ON p.id = pd.product_id WHERE pd.language_id = ? 
           LIMIT $start, $perpage", [$lang['id']]);
    }
}