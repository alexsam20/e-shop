<?php

function print_pre($var, $exit = false)
{
    echo '<pre>' . print_r($var, 1) . '</pre>';
    if ($exit) {
        die();
    }
}