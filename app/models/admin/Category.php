<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Category extends AppModel
{
    public function delete(): void
    {
        $id = serverMethodGET('id');
        $errors = '';
        $children = R::count('category', 'parent_id = ?', [$id]);
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($children) {
            $errors .= 'Error! Category nested items.<br>';
        }
        if ($products) {
            $errors .= 'Error! There are products in the category.<br>';
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
        } else {
            R::exec("DELETE FROM category WHERE id = ?", [$id]);
            R::exec("DELETE FROM category_description WHERE category_id = ?", [$id]);
            $_SESSION['success'] = 'Category deleted';
        }
        redirect();
    }

    public function categoryValidate(): bool
    {
        $errors = '';
        foreach ($_POST['category_description'] as $lang_id => $item) {
            $item['title'] = trim(htmlspecialchars($item['title']));
            if (empty($item['title'])) {
                $errors .= "The title in the tab is not filled &nbsp;{$lang_id}<br>";
            }
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }
}