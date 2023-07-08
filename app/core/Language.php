<?php

namespace shop;

class Language
{
    /**
     * @var array
     * массив со всеми переводными фразами страницы
     */
    public static array $langData = [];

    /**
     * @var array
     * массив с переводными фразами шаблона
     */
    public static array $langLayout = [];

    /**
     * @var array
     * массив с переводными фразами вида
     */
    public static array $langView = [];

    public static function loadTranslatePhrase($code, $view): void
    {
        $langLayout = APP . "/languages/{$code}.php";
        $langView = APP . "/languages/{$code}/{$view['controller']}/{$view['action']}.php";
        if (file_exists($langLayout)) {
            self::$langLayout = require_once $langLayout;
        }
        if (file_exists($langView)) {
            self::$langView = require_once $langView;
        }
        self::$langData = array_merge(self::$langLayout, self::$langView);
    }

    public static function getTranslatePhrase($key)
    {
        return self::$langData[$key] ?? $key;
    }
}