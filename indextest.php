<?php

session_start();
echo $_SESSION['admin'];

require 'debug.php';
require 'controller/Front.php';
require 'controller/Back.php';

try {
    if ($_GET['action'] == 'listPosts') {
        $frontcontroller = new \Blog\Controller\frontController();
        $frontcontroller->listPosts();
    } else {
        $frontcontroller = new \Blog\Controller\frontController();
        $frontcontroller->listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
