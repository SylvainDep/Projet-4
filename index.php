<?php

session_start();

require 'autoloader.php';
require 'debug.php';

$autoloader = new \App\config\Autoloader;
$autoloader->register();

$router = new \App\config\Router();
$router->start();