<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;
use shop\App;

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

    public function getDownloads($q): array
    {
        $data = [];
        $downloads = R::getAssoc("SELECT download_id, name FROM download_description WHERE name LIKE ? LIMIT 10", ["%{$q}%"]);
        if ($downloads) {
            $i = 0;
            foreach ($downloads as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        return $data;
    }

    public function productValidate(): bool
    {
        $errors = '';
        if (!is_numeric(serverMethodPOST('price'))) {
            $errors .= "Price must be numeric.<br>";
        }
        if (!is_numeric(serverMethodPOST('old_price'))) {
            $errors .= "Old price must be numeric.<br>";
        }

        foreach ($_POST['product_description'] as $lang_id => $item) {
            $item['title'] = trim($item['title']);
            $item['exerpt'] = trim($item['exerpt']);
            if (empty($item['title'])) {
                $errors .= "The name in the tab is not filled. &nbsp;{$lang_id}<br>";
            }
            if (empty($item['exerpt'])) {
                $errors .= "The short description in the tab is not filled. &nbsp;{$lang_id}<br>";
            }
            if (empty($item['content'])) {
                $errors .= "The description in the tab is not filled. &nbsp;{$lang_id}<br>";
            }
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }

    public function saveProduct(): bool
    {
        $lang = App::$app::getProperty('language')['id'];
        R::begin();
        try {
            // product
            $product = R::dispense('product');
            $product->category_id = serverMethodPOST('parent_id', 'i');
            $product->price = serverMethodPOST('price', 'f');
            $product->old_price = serverMethodPOST('old_price', 'f');
            $product->status = serverMethodPOST('status') ? 1 : 0;
            $product->hit = serverMethodPOST('hit') ? 1 : 0;
            $product->img = serverMethodPOST('img') ?: NO_IMAGE;
            $product->is_download = serverMethodPOST('is_download') ? 1 : 0;
            $product_id = R::store($product);

            $product->slug = AppModel::createSlug('product', 'slug', $_POST['product_description'][$lang]['title'], $product_id);
            R::store($product);

            // product_description
            foreach ($_POST['product_description'] as $lang_id => $item) {
                R::exec("INSERT INTO product_description (product_id, language_id, title, content, excerpt, keywords, description) VALUES (?,?,?,?,?,?,?)", [
                    $product_id,
                    $lang_id,
                    $item['title'],
                    $item['content'],
                    $item['exerpt'],
                    $item['keywords'],
                    $item['description'],
                ]);
            }

            // product_gallery if exists
            if (isset($_POST['gallery']) && is_array($_POST['gallery'])) {
                $sql = "INSERT INTO product_gallery (product_id, img) VALUES ";
                foreach ($_POST['gallery'] as $item) {
                    $sql .= "({$product_id}, ?),";
                }
                $sql = rtrim($sql, ',');
                R::exec($sql, $_POST['gallery']);
            }

            // product_download if is_download
            if ($product->is_download) {
                $download_id = serverMethodPOST('is_download', 'i');
                R::exec("INSERT INTO product_download (product_id, download_id) VALUES (?,?)", [$product_id, $download_id]);
            }

            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            $_SESSION['form_data'] = $_POST;
            print_pre($e, 1);
            return false;
        }
    }
}