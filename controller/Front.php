<?php

namespace Blog\Controller;

require 'vendor/autoload.php';

use Model\PostManager;
use Model\CommentManager;
use Model\AdminManager;
use Blog\Auth;
use Exception;

class frontController
{

    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPublishedPosts();

        require('view/frontend/listPostsView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

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
        $AdminManager = new AdminManager();

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
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $_GET['postid'];
        $commentManager->setAlert($_GET['commentid']);

        header('Location: index.php?action=post&origin=commentalert&id=' . $post);
    }

    public function checkpassword($userPassword, $userId)
    {
        $AdminManager = new AdminManager();

        $resultat = $AdminManager->getCredentials();

        $isPasswordCorrect = password_verify($userPassword, $resultat['password']);

        $isIdCorrect = $userId == $resultat['user'];

        if (!$resultat) {
            echo 'Le service est temporairement indisponible, veuillez réessayer plus tard';
        } else {
            if ($isPasswordCorrect AND $isIdCorrect) {
                Auth::auth();
                header('Location: index.php?action=homeadmin');
            } else {
                echo 'Mauvais identifiant ou mot de passe ! 
                <a href="index.php">Revenir à l\'accueil</a>
                <a href="index.php?action=login">Connexion</a>';
            }
        }
    }
}