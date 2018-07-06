<?php

namespace Blog\Controller;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

class backController
{
    public function adminBoard()
    {
        $postManager = new \Blog\Model\PostManager();
        $commentManager = new \Blog\Model\CommentManager();

        $posts = $postManager->getPosts();
        $alerts = $commentManager->getAlertComments();

        require('view/frontend/homeadmin.php');
    }

    public function checkComment($alertcomment)
    {
        $postManager = new \Blog\Model\PostManager();
        $commentManager = new \Blog\Model\CommentManager();

        $post = $_GET['postid'];
        $commentManager->removeAlert($alertcomment);

        header('Location: index.php?action=homeadmin');
    }

    public function newPost()
    {
        require('view/frontend/newpost.php');
    }

    public function editPost()
    {
        $postManager = new \Blog\Model\PostManager();

        $post = $postManager->getPost($_GET['id']);

        require('view/frontend/editpost.php');
    }

    public function addPost($title, $content)
    {
        $postManager = new \Blog\Model\PostManager();

        $affectedLines = $postManager->addPost($title, $content);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?action=homeadmin');
        }
    }

    public function updatePost($title, $content, $postId)
    {
        $postManager = new \Blog\Model\PostManager();

        $affectedLines = $postManager->replacePost($title, $content, $postId);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: http://localhost:8888/index.php?action=editpost&id=' . $postId);
        }
    }

    public function deletePost($postId)
    {
        $postManager = new \Blog\Model\PostManager();

        $affectedLines = $postManager->deletePost($postId);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?action=homeadmin');
        }
    }

    public function deleteComment($commentId)
    {
        $commentManager = new \Blog\Model\CommentManager();

        $affectedLines = $commentManager->removeComment($commentId);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?action=homeadmin');
        }
    }

    public function checkpassword($userPassword)
    {
        $AdminManager = new \Blog\Model\AdminManager();

        $resultat = $AdminManager->getPassword();

        $isPasswordCorrect = password_verify($userPassword, $resultat['password']);

        if (!$resultat) {
            echo 'Le service est temporairement indisponible, veuillez réessayer plus tard';
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['admin'] = 'Jean';
                $this->adminBoard();
            } else {
                echo 'Mauvais identifiant ou mot de passe ! 
                <a href="index.php">Revenir à l\'accueil</a>
                <a href="index.php?action=login">Connexion</a>';
            }
        }
    }

    public function logOut()
    {
        $_SESSION = array();

        require('view/frontend/logout.php');
    }
}