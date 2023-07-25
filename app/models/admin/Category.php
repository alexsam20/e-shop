<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;
use shop\App;

class Category extends AppModel
{
    public function delete(): void
    {
        $id = getMethodGET('id');
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

    public function saveCategory(): bool
    {
        $lang = App::$app::getProperty('language')['id'];
        R::begin();
        try {
            $category = R::dispense('category');
            $category->parent_id = getMethodPOSt('parent_id', 'i');
            $category_id = R::store($category);
            $category->slug = AppModel::createSlug('category', 'slug', $_POST['category_description'][$lang]['title'], $category_id);
            R::store($category);

            foreach ($_POST['category_description'] as $lang_id => $item) {
                R::exec("INSERT INTO category_description (category_id, language_id, title, description, keywords, content) VALUES (?,?,?,?,?,?)", [
                    $category_id,
                    $lang_id,
                    $item['title'],
                    $item['description'],
                    $item['keywords'],
                    $item['content'],
                ]);
            }
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }

    public function updateCategory($id): bool
    {
        R::begin();
        try {
            $category = R::load('category', $id);
            if (!$category) {
                return false;
            }
            $category->parent_id = getMethodPOSt('parent_id', 'i');
            R::store($category);

            foreach ($_POST['category_description'] as $lang_id => $item) {
                R::exec("UPDATE category_description SET title = ?, description = ?, keywords = ?, content = ? WHERE category_id = ? AND language_id = ?", [
                    $item['title'],
                    $item['description'],
                    $item['keywords'],
                    $item['content'],
                    $id,
                    $lang_id,
                ]);
            }
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }

    public function getCategory($id): array
    {
        return R::getAssoc("SELECT cd.language_id, cd.*, c.* FROM category_description cd JOIN category c ON c.id = cd.category_id WHERE cd.category_id = ?", [$id]);
    }
}