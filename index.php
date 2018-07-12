<?php

session_start();
echo $_SESSION['admin'];

require 'debug.php';
require 'controller/Front.php';
require 'controller/Back.php';
require 'router.php';

$router = new \App\config\Router();
$router->start();
