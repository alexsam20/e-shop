<?php

namespace app\models;

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

}