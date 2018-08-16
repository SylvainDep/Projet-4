<?php

session_start();

require 'vendor/autoload.php';

$router = new \App\config\Router();
$router->start();