<?php

namespace App\config;

class Router2
{
    public function start()
    {
        include_once 'controller/Front.php';
        include_once 'controller/Back.php';

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    $frontcontroller = new \Blog\Controller\frontController();
                    $frontcontroller->listPosts();
                } elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $frontcontroller = new \Blog\Controller\frontController();
                        $frontcontroller->post();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé.<br/><a href="index.php">Revenir à l\'accueil</a>');
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $frontcontroller = new \Blog\Controller\frontController();
                            $frontcontroller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis.<br/><a href="index.php">Revenir à l\'accueil</a>');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé.<br/><a href="index.php">Revenir à l\'accueil</a>');
                    }
                } elseif ($_GET['action'] == 'doalert') {
                    if (isset($_GET['postid']) && $_GET['postid'] > 0 && isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                        $frontcontroller = new \Blog\Controller\frontController();
                        $frontcontroller->doAlert($_GET['postid'], $_GET['commentid']);
                    } else {
                        throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                    }
                } elseif ($_GET['action'] == 'login') {
                    if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->adminBoard();
                    } else {
                        $frontcontroller = new \Blog\Controller\frontController();
                        $frontcontroller->loginAccess();
                    }
                } elseif ($_GET['action'] == 'homeadmin' ) {
                    if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->adminBoard();
                    } else {
                        $frontcontroller = new \Blog\Controller\frontController();
                        $frontcontroller->checkpassword($_POST['password'], $_POST['pseudo']);
                    }
                } elseif ($_GET['action'] == 'checkcomment') {
                    if (isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->checkComment($_GET['commentid']);
                    } else {
                        throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié<br/><a href="index.php?action=homeadmin">Revenir au tableau de bord</a>');
                    }
                } elseif ($_GET['action'] == 'newpost') {
                    $backcontroller = new \Blog\Controller\backController();
                    $backcontroller->newPost();
                } elseif ($_GET['action'] == 'addpost') {
                    if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->addPost($_POST['title'], $_POST['content']);
                    } else {
                        throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                    }
                } elseif ($_GET['action'] == 'editpost') {
                    $backcontroller = new \Blog\Controller\backController();
                    $backcontroller->editPost();
                } elseif ($_GET['action'] == 'updatepost') {
                    if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
                    } else {
                        throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                    }
                } elseif ($_GET['action'] == 'deletepost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->deletePost($_GET['id']);
                    } else {
                        throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<<a href="index.php?action=homeadmin">Revenir au tableau de bord</a>');
                    }
                } elseif ($_GET['action'] == 'deletecomment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->deleteComment($_GET['id']);
                    } else {
                        throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                    }
                } elseif ($_GET['action'] == 'deletepostcomment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $backcontroller = new \Blog\Controller\backController();
                        $backcontroller->deletePostComment($_GET['id'], $_GET['postid']);
                    } else {
                        throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                    }
                } elseif ($_GET['action'] == 'publishpost') {
                    $backcontroller = new \Blog\Controller\backController();
                    $backcontroller->publishPost($_GET['id']);
                } elseif ($_GET['action'] == 'unpublishpost') {
                    $backcontroller = new \Blog\Controller\backController();
                    $backcontroller->unpublishPost($_GET['id']);
                } elseif ($_GET['action'] == 'logout') {
                    $backcontroller = new \Blog\Controller\backController();
                    $backcontroller->logOut();
                } elseif ($_GET['action'] == 'passwordrecovery') {
                    $frontcontroller = new \Blog\Controller\frontController();
                    $frontcontroller->passwordPage();
                } elseif ($_GET['action'] == 'recoverpassword') {
                    $frontcontroller = new \Blog\Controller\frontController();
                    $frontcontroller->recoverPassword($_POST['loginmail']);
                } else {
                    $frontcontroller = new \Blog\Controller\frontController();
                    $frontcontroller->listPosts();
                }
            } else {
                $frontcontroller = new \Blog\Controller\frontController();
                $frontcontroller->listPosts();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}