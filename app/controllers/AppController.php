<?php

namespace app\controllers;

use JetBrains\PhpStorm\Pure;
use shop\Controller;

class AppController extends Controller
{
    #[Pure]
    public function __construct(array $route = [])
    {
        parent::__construct($route);
    }
}