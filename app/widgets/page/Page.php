<?php

namespace app\widgets\page;

use RedBeanPHP\R;
use shop\App;
use shop\Cache;

class Page
{
    protected $language;
    protected string $container = 'ul';
    protected string $class = 'page-menu';
    protected int $cache = 3600;
    protected string $cacheKey = 'ishop_page_menu';
    protected string $menuPageHtml;
    protected string $prepend = '';
    protected $data;

    public function __construct($options = [])
    {
        $this->language = App::$app::getProperty('language');
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options): void
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::getInstance();
        $this->menuPageHtml = $cache->getCache("{$this->cacheKey}_{$this->language['code']}");

        if (!$this->menuPageHtml) {
            $this->data = R::getAssoc("SELECT p.*, pd.* FROM page p 
            JOIN page_description pd
            ON p.id = pd.page_id
            WHERE pd.language_id = ?", [$this->language['id']]);
            $this->menuPageHtml = $this->getFooterMenuPageHtml();
            if ($this->cache) {
                $cache->setCache("{$this->cacheKey}_{$this->language['code']}", $this->menuPageHtml, $this->cache);
            }
        }

        $this->output();
    }

    protected function getFooterMenuPageHtml(): string
    {
        $html = '';
        foreach ($this->data as $k => $v) {
            $html .= "<li><a href='page/{$v['slug']}'>{$v['title']}</a></li>";
        }
        return $html;
    }

    protected function output(): void
    {
        echo "<{$this->container} class='{$this->class}'>";
        echo $this->prepend;
        echo $this->menuPageHtml;
        echo "</{$this->container}>";
    }
}