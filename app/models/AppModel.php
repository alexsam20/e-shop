<?php

namespace app\models;

use RedBeanPHP\R;
use shop\Model;

class AppModel extends Model
{
    public function clearSession($name): void
    {
        if (empty($_SESSION[$name])) {
            return;
        }
        unset($_SESSION[$name]);
    }

    public function getCategories($lang): array
    {
        return R::getAssoc("SELECT c.*, cd.* FROM category c 
           JOIN category_description cd
           ON c.id = cd.category_id
           WHERE cd.language_id = ?", [$lang['id']]);
    }

}