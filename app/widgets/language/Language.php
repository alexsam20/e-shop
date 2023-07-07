<?php

namespace app\widgets\language;

use RedBeanPHP\R;
use shop\App;

class Language
{
    protected string $tpl = '';
    protected array $languages = [];
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__ . '/lang_tpl.php';
        $this->run();
    }

    private function run(): void
    {
        $this->languages = App::$app::getProperty('languages');
        $this->language = App::$app::getProperty('language');
        echo $this->getHtml();
    }

    public static function getLanguages(): array
    {
        return R::getAssoc("SELECT `code`, `title`, `base`, `id` FROM `language` ORDER BY `base` DESC ");
    }

    public static function getLanguage($languages): mixed
    {
        $lang = App::$app::getProperty('lang');
        if ($lang && array_key_exists($lang, $languages)) {
            $key = $lang;
        } elseif (!$lang) {
            $key = key($languages);
        } else {
            throw new \RuntimeException("Not Found Language {$lang}", 404);
        }

        $langInfo = $languages[$key];
        $langInfo['code'] = $key;

        return $langInfo;
    }

    private function getHtml(): string
    {
        ob_start();
        require_once $this->tpl;

        return ob_get_clean();
    }
}