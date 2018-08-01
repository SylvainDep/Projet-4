<?php

namespace Blog\Controller;

use Exception;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
require_once('Back.php');

class frontController
{
    public function listPosts()
    {
        $postManager = new \Blog\Model\PostManager();
        $posts = $postManager->getPublishedPosts();

        require('view/frontend/listPostsView.php');
    }

    public function post()
    {
        $postManager = new \Blog\Model\PostManager();
        $commentManager = new \Blog\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new \Blog\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function loginAccess()
    {
        require('view/frontend/login.php');
    }

    public function passwordPage()
    {
        require('view/frontend/passwordrecovery.php');
    }

    public function recoverPassword($useremail)
    {
        $AdminManager = new \Blog\Model\AdminManager();

        $resultat = $AdminManager->getAdminEmail();

        if ($resultat['email'] == $useremail) {
            mail ($resultat['email'], 'Récupération de mot de passe' , 'Le mot de passe pour accéder au site est' . $resultat['password']);
            header('Location: index.php?action=login');
        } else {
            throw new Exception('Votre adresse mail n\'est pas reconnue');
        }
    }

    public function doAlert($post, $alertcomment)
    {
        $postManager = new \Blog\Model\PostManager();
        $commentManager = new \Blog\Model\CommentManager();

        $post = $_GET['postid'];
        $commentManager->setAlert($_GET['commentid']);

        header('Location: index.php?action=post&origin=commentalert&id=' . $post);
    }

    public function checkpassword($userPassword, $userId)
    {
        $AdminManager = new \Blog\Model\AdminManager();

        $resultat = $AdminManager->getCredentials();

        $isPasswordCorrect = password_verify($userPassword, $resultat['password']);

        if($userId == $resultat['user']) {
            $isIdCorrect = true;
        } else {
            $isIdCorrect = false;
        }

        if (!$resultat) {
            echo 'Le service est temporairement indisponible, veuillez réessayer plus tard';
        } else {
            if ($isPasswordCorrect AND $isIdCorrect) {
                $_SESSION['admin'] = 'Jean';
                $backcontroller = new \Blog\Controller\backController();
                $backcontroller->adminBoard();
            } else {
                echo 'Mauvais identifiant ou mot de passe ! 
                <a href="index.php">Revenir à l\'accueil</a>
                <a href="index.php?action=login">Connexion</a>';
            }
        }
    }
}