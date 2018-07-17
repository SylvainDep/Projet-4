<?php

session_start();

require 'autoloader.php';

$autoloader = new \App\config\Autoloader;
$autoloader->register();

$router = new \App\config\Router();
$router->start();