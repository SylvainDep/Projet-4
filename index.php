<?php

session_start();
echo $_SESSION['admin'];

require 'debug.php';
require 'controller/Front.php';
require 'controller/Back.php';

$frontcontroller = new \Blog\Controller\frontController();
$backcontroller = new \Blog\Controller\backController();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontcontroller->listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontcontroller->post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé.<br/>
                <a href="index.php">Revenir à l\'accueil</a>');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontcontroller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.<br/>
                    <a href="index.php">Revenir à l\'accueil</a>');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé.<br/>
                    <a href="index.php">Revenir à l\'accueil</a>');
            }
        } elseif ($_GET['action'] == 'login') {
            if (isset($_SESSION['admin'])) {
                $backcontroller->adminBoard();
            } else {
                $frontcontroller->loginAccess();
            }
        } elseif ($_GET['action'] == 'homeadmin') {
            if (isset($_SESSION['admin'])) {
                $backcontroller->adminBoard();
            } else {
                $backcontroller->checkpassword($_POST['password'], $_POST['pseudo']);
            }
        } elseif ($_GET['action'] == 'doalert') {
            if (isset($_GET['postid']) && $_GET['postid'] > 0 && isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                $frontcontroller->doAlert($_GET['postid'], $_GET['commentid']);
            } else {
                throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié');
            }
        } elseif ($_GET['action'] == 'checkcomment') {
            if ($_SESSION['admin'] == 'Jean') {
                if (isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                    $backcontroller->checkComment($_GET['commentid']);
                } else {
                    throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'newpost') {
            if ($_SESSION['admin'] == 'Jean') {
                $backcontroller->newPost();
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'addpost') {
            if ($_SESSION['admin'] == 'Jean') {
                if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                    $backcontroller->addPost($_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'editpost') {
            if ($_SESSION['admin'] == 'Jean') {
                $backcontroller->editPost();
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'updatepost') {
            if ($_SESSION['admin'] == 'Jean') {
                if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                    $backcontroller->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
                } else {
                    throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'deletepost') {
            if ($_SESSION['admin'] == 'Jean') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $backcontroller->deletePost($_GET['id']);
                } else {
                    throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'deletecomment') {
            if ($_SESSION['admin'] == 'Jean') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $backcontroller->deleteComment($_GET['id']);
                } else {
                    throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'deletepostcomment') {
            if ($_SESSION['admin'] == 'Jean') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $backcontroller->deletePostComment($_GET['id'], $_GET['postid']);
                } else {
                    throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article');
                }
            } else {
                $backcontroller->logOut();
            }
        } elseif ($_GET['action'] == 'logout') {
            $backcontroller->logOut();
        }
    } else {
        $frontcontroller->listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
