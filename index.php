<?php

session_start();
echo $_SESSION['admin'];

require 'autoloader.php';

$autoloader = new \App\config\Autoloader;
$autoloader->register();

$router = new \App\config\Router();
$router->start();