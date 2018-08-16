<?php

namespace App\config;

require 'vendor/autoload.php';

use Blog\Controller\frontController;
use Blog\Controller\backController;
use Exception;


class Router
{
    public function start()
    {
        $frontcontroller = new frontController();
        $backcontroller = new backController();

        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'listPosts':
                        $frontcontroller->listPosts();
                        break;
                    case 'post':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $frontcontroller->post();
                        }
                        else {
                            throw new Exception('Aucun identifiant de billet envoyé.<br/><a href="index.php">Revenir à l\'accueil</a>');
                        }
                        break;
                    case 'addComment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                                $frontcontroller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                            }
                            else {
                                throw new Exception('Tous les champs ne sont pas remplis.<br/><a href="index.php">Revenir à l\'accueil</a>');
                            }
                        }
                        else {
                            throw new Exception('Aucun identifiant de billet envoyé.<br/><a href="index.php">Revenir à l\'accueil</a>');
                        }
                        break;
                    case 'doalert':
                        if (isset($_GET['postid']) && $_GET['postid'] > 0 && isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                            $frontcontroller->doAlert($_GET['postid'], $_GET['commentid']);
                        } else {
                            throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                        }
                        break;
                    case 'login':
                        if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
                            $backcontroller->adminBoard();
                        } else {
                            $frontcontroller->loginAccess();
                        }
                        break;
                    case 'homeadmin':
                        if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
                            $backcontroller->adminBoard();
                        } else {
                            if (isset($_POST['password']) AND isset($_POST['pseudo'])) {
                                $frontcontroller->checkpassword($_POST['password'], $_POST['pseudo']);
                            } else {
                                throw new Exception('Veuillez indiquer un identifiant et un mot de passe.<br/><a href="index.php">Revenir à l\'accueil</a>');
                            }
                        }
                        break;
                    case 'checkcomment':
                        if (isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                            $backcontroller->checkComment($_GET['commentid']);
                        } else {
                            throw new Exception('Le commentaire ou l\'article n\'ont pu être identifié<br/><a href="index.php?action=homeadmin">Revenir au tableau de bord</a>');
                        }
                        break;
                    case 'newpost':
                        $backcontroller->newPost();
                        break;
                    case 'addpost':
                        if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                            $backcontroller->addPost($_POST['title'], $_POST['content']);
                        } else {
                            throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                        }
                        break;
                    case 'editpost':
                        $backcontroller->editPost();
                        break;
                    case 'updatepost':
                        if (!empty($_POST['title']) OR !empty($_POST['content'])) {
                            $backcontroller->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
                        } else {
                            throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                        }
                        break;
                    case 'deletepost':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $backcontroller->deletePost($_GET['id']);
                        } else {
                            throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<<a href="index.php?action=homeadmin">Revenir au tableau de bord</a>');
                        }
                        break;
                    case 'deletecomment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $backcontroller->deleteComment($_GET['id']);
                        } else {
                            throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                        }
                        break;
                    case 'deletepostcomment':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $backcontroller->deletePostComment($_GET['id'], $_GET['postid']);
                        } else {
                            throw new Exception('Veuillez indiquer un titre et un contenu pour l\'article<br/><a href="javascript:history.back()">Revenir à l\'article</a>');
                        }
                        break;
                    case 'publishpost':
                        $backcontroller->publishPost($_GET['id']);
                        break;
                    case 'unpublishpost':
                        $backcontroller->unpublishPost($_GET['id']);
                        break;
                    case 'logout':
                        $backcontroller->logOut();
                        break;
                    case 'passwordrecovery':
                        $frontcontroller->passwordPage();
                        break;
                    case 'recoverpassword':
                        $frontcontroller->recoverPassword($_POST['loginmail']);
                        break;
                    default:
                        $frontcontroller->listPosts();
                }
            } else {
                $frontcontroller->listPosts();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}