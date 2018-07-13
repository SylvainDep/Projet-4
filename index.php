<?php

session_start();
echo $_SESSION['admin'];

require 'debug.php';

require 'autoloader.php';
$autoloader = new \App\config\Autoloader;
$autoloader->register();

require 'router.php';
$router = new \App\config\Router();
$router->start();
