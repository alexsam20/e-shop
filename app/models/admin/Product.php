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
        if (!is_numeric(getMethodPOSt('price'))) {
            $errors .= "Price must be numeric.<br>";
        }
        if (!is_numeric(getMethodPOSt('old_price'))) {
            $errors .= "Old price must be numeric.<br>";
        }

        foreach ($_POST['product_description'] as $lang_id => $item) {
            $item['title'] = trim($item['title']);
            $item['excerpt'] = trim($item['excerpt']);
            if (empty($item['title'])) {
                $errors .= "The name in the tab is not filled. &nbsp;{$lang_id}<br>";
            }
            if (empty($item['excerpt'])) {
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
            $product->category_id = getMethodPOSt('parent_id', 'i');
            $product->price = getMethodPOSt('price', 'f');
            $product->old_price = getMethodPOSt('old_price', 'f');
            $product->status = getMethodPOSt('status') ? 1 : 0;
            $product->hit = getMethodPOSt('hit') ? 1 : 0;
            $product->img = getMethodPOSt('img') ?: NO_IMAGE;
            $product->is_download = getMethodPOSt('is_download') ? 1 : 0;
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
                    $item['excerpt'],
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
                $download_id = getMethodPOSt('is_download', 'i');
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

    public function updateProduct($id): bool
    {
        R::begin();
        try {
            // product
            $product = R::load('product', $id);
            if (!$product) {
                return false;
            }
            $product->category_id = getMethodPOSt('parent_id', 'i');
            $product->price = getMethodPOSt('price', 'f');
            $product->old_price = getMethodPOSt('old_price', 'f');
            $product->status = getMethodPOSt('status') ? 1 : 0;
            $product->hit = getMethodPOSt('hit') ? 1 : 0;
            $product->img = getMethodPOSt('img') ?: NO_IMAGE;
            $product->is_download = getMethodPOSt('is_download') ? 1 : 0;
            $product_id = R::store($product);

            // product_description
            foreach ($_POST['product_description'] as $lang_id => $item) {
                R::exec("UPDATE product_description SET title = ?, content = ?, excerpt = ?, keywords = ?, description = ? 
                             WHERE product_id = ? AND language_id = ?", [
                    $item['title'],
                    $item['content'],
                    $item['excerpt'],
                    $item['keywords'],
                    $item['description'],
                    $id,
                    $lang_id,
                ]);
            }

            // product_gallery if exists
            if (!isset($_POST['gallery'])) {
                R::exec("DELETE FROM product_gallery WHERE product_id = ?", [$id]);
            }

            if (isset($_POST['gallery']) && is_array($_POST['gallery'])) {
                $gallery = $this->getGallery($id);

                if ( (count($gallery) != count($_POST['gallery'])) || array_diff($gallery, $_POST['gallery']) || array_diff($_POST['gallery'], $gallery) ) {
                    R::exec("DELETE FROM product_gallery WHERE product_id = ?", [$id]);
                    $sql = "INSERT INTO product_gallery (product_id, img) VALUES ";
                    foreach ($_POST['gallery'] as $item) {
                        $sql .= "({$id}, ?),";
                    }
                    $sql = rtrim($sql, ',');
                    R::exec($sql, $_POST['gallery']);
                }
            }

            // product_download if is_download
            R::exec("DELETE FROM product_download WHERE product_id = ?", [$id]);
            if ($product->is_download) {
                $download_id = getMethodPOSt('is_download', 'i');
                R::exec("INSERT INTO product_download (product_id, download_id) VALUES (?,?)", [$product_id, $download_id]);
            }

            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }

    public function getProduct($id): array|false
    {
        $product = R::getAssoc("SELECT pd.language_id, pd.*, p.* FROM product_description pd 
            JOIN product p ON p.id = pd.product_id WHERE pd.product_id = ?", [$id]);
        if (!$product) {
            return false;
        }
        $key = App::$app::getProperty('language')['id'];
        if ($product[$key]['is_download']) {
            $download_info = $this->getProductDownload($id);
            $product[$key]['download_id'] = $download_info['download_id'];
            $product[$key]['download_name'] = $download_info['name'];
        }
        return $product;
    }

    public function getProductDownload($product_id): array
    {
        $lang_id = App::$app::getProperty('language')['id'];
        return R::getRow("SELECT pd.download_id, dd.name FROM product_download pd 
            JOIN download_description dd ON pd.download_id = dd.download_id 
            WHERE pd.product_id = ? AND dd.language_id = ?", [$product_id, $lang_id]);
    }

    public function getGallery($id): array
    {
        return R::getCol("SELECT img FROM product_gallery WHERE product_id = ?", [$id]);
    }

    public function deleteProduct($id): bool
    {
        R::begin();
        try {
            $product = R::load('product', $id);
            if (!$product) {
                return false;
            }
            if($product->is_download) {
                R::exec("DELETE FROM product_download WHERE product_id = ?", [(int)$id]);
            }
            $images = R::getAssocRow("SELECT id, img FROM product_gallery WHERE product_id = ?", [(int)$id]);
            if ($images) {
                foreach ($images as $img) {
                    unlink(trim($img['img'], '/'));
                }
            }
            R::exec("DELETE FROM product_gallery WHERE product_id = ?", [(int)$id]);
            R::exec("DELETE FROM product_description WHERE product_id = ?", [(int)$id]);
            unlink(trim($product->img, '/'));
            R::trash($product);
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }
}