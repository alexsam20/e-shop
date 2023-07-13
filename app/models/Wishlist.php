<?php

namespace app\models;

use RedBeanPHP\R;

class Wishlist
{
    public function getProduct($id): array|null|string
    {
        return R::getCell("SELECT id FROM product WHERE status = 1 AND id = ?", [$id]);
    }

    public function addToWishlist($id): void
    {
        $wishlist = self::getWishlistIds();
        if (!$wishlist) {
            setcookie('wishlist', $id, time() + COOKIE_TIME, '/');
        } else {
            if (!in_array($id, $wishlist)) {
                if (count($wishlist) > 5) {
                    array_shift($wishlist);
                }
                $wishlist[] = $id;
                $wishlist = implode(',', $wishlist);
                setcookie('wishlist', $wishlist, time() + COOKIE_TIME, '/');
            }
        }
    }

    public static function getWishlistIds(): array
    {
        $wishlist = $_COOKIE['wishlist'] ?? '';
        if ($wishlist) {
            $wishlist = explode(',', $wishlist);
        }
        if (is_array($wishlist)) {
            $wishlist = array_slice($wishlist, 0, 6);
            $wishlist = array_map('intval', $wishlist);
            return $wishlist;
        }
        return [];
    }

    public function getWishlistProducts($lang): array
    {
        $wishlist = self::getWishlistIds();
        if ($wishlist) {
            $wishlist = implode(',', $wishlist);
            return R::getAll("SELECT p.*, pd.* FROM product p JOIN product_description pd on p.id = pd.product_id WHERE p.status = 1 AND p.id IN ($wishlist) AND pd.language_id = ? LIMIT 6", [$lang['id']]);
        }
        return [];
    }

    public function deleteFromWishlist($id): bool
    {
        $wishlist = self::getWishlistIds();
        $key = array_search($id, $wishlist);
        if (false !== $key) {
            unset($wishlist[$key]);
            if ($wishlist) {
                $wishlist = implode(',', $wishlist);
                setcookie('wishlist', $wishlist, time() + COOKIE_TIME, '/');
            } else {
                setcookie('wishlist', '', time()-3600, '/');
            }
            return true;
        }
        return false;
    }
}