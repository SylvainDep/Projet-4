<?php

namespace App\config;

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        require 'Back/' . $class . '.php';
        require 'Front/' . $class . '.php';
    }
}