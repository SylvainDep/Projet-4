<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 18/08/2018
 * Time: 10:50
 */

namespace Blog;

require 'vendor/autoload.php';

class Auth
{
    public static function isAuth(){
        if(isset($_SESSION['auth'])) {
            return $_SESSION['auth'] === true;
        }

    }

    public static function auth(){
        $_SESSION['auth'] = true;
    }

    public static function logout(){
        session_destroy();
        $_SESSION = array();

        require('view/frontend/logout.php');
    }
}