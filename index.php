<?php

session_start();

require 'debug.php';
require 'controller/frontend.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'login') {
            loginAccess();
        } elseif ($_GET['action'] == 'homeadmin') {
            if ($_SESSION['admin']) {
                adminBoard();
            } else {
                checkpassword($_POST['password']);
            }
        } elseif ($_GET['action'] == 'doalert') {
            doAlert($_GET['postid'], $_GET['commentid']);
        } elseif ($_GET['action'] == 'checkcomment') {
            checkComment($_POST['postid'], $_GET['commentid']);
        } elseif ($_GET['action'] == 'newpost') {
            newPost();
        } elseif ($_GET['action'] == 'addpost') {
            addPost($_POST['title'], $_POST['content']);
        } elseif ($_GET['action'] == 'editpost') {
            editPost();
        } elseif ($_GET['action'] == 'updatepost') {
            updatePost($_POST['title'], $_POST['content'], $_GET['id']);
        } elseif ($_GET['action'] == 'deletepost') {
            deletePost($_GET['id']);
        } elseif ($_GET['action'] == 'deletecomment') {
            deleteComment($_GET['id']);
        } elseif ($_GET['action'] == 'logout') {
            logOut();
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
