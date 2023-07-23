<?php

namespace app\controllers\admin;

use shop\App;
use shop\Cache;

class CacheController extends AppController
{

    public function indexAction(): void
    {
        $title = 'Cache settings';
        $this->setMeta("Administrator :: {$title}");
        $this->setData(compact('title'));
    }

    public function deleteAction(): void
    {
        $langs = App::$app::getProperty('languages');
        $cache_key = serverMethodGET('cache', 's');
        $cache = Cache::getInstance();
        if ($cache_key === 'category') {
            foreach ($langs as $lang => $item) {
                $cache->deleteCache("ishop_menu_{$lang}");
            }
        }
        if ($cache_key === 'page') {
            foreach ($langs as $lang => $item) {
                $cache->deleteCache("ishop_page_menu_{$lang}");
            }
        }
        $_SESSION['success'] = 'Selected cache deleted';
        redirect();
    }
}