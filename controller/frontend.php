<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function listPosts()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();


    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function loginAccess()
{
  require('view/frontend/login.php');
}

function adminBoard()
{
  $postManager = new \Blog\Model\PostManager();
  $commentManager = new \Blog\Model\CommentManager();

  $posts = $postManager->getPosts();
  $alerts = $commentManager->getAlertComments();

  require('view/frontend/homeadmin.php');
}

function doAlert($post, $alertcomment)
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $_GET['postid'];
    $commentManager->setAlert($_GET['commentid']);

    header('Location: index.php?action=post&id=' . $post);
}

function checkComment($alertcomment)
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $_GET['postid'];
    $commentManager->removeAlert($alertcomment);

    header('Location: index.php?action=homeadmin');
}

function newPost()
{
    require('view/frontend/newpost.php');
}

function editPost()
{
    $postManager = new \Blog\Model\PostManager();

    $post = $postManager->getPost($_GET['id']);

    require('view/frontend/editpost.php');
}

function addPost($title, $content)
{
    $postManager = new \Blog\Model\PostManager();

    $affectedLines = $postManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=homeadmin');
    }
}

function updatePost($title, $content, $postId)
{
    $postManager = new \Blog\Model\PostManager();

    $affectedLines = $postManager->replacePost($title, $content, $postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: http://localhost:8888/index.php?action=editpost&id=' .$postId);
    }
}

function deletePost($postId)
{
    $postManager = new \Blog\Model\PostManager();

    $affectedLines = $postManager->deletePost($postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=homeadmin');
    }
}

function deleteComment($commentId)
{
    $commentManager = new \Blog\Model\CommentManager();

    $affectedLines = $commentManager->removeComment($commentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=homeadmin');
    }
}

function checkpassword($userPassword)
{
    $AdminManager = new \Blog\Model\AdminManager();

    $resultat = $AdminManager->getPassword();

    $isPasswordCorrect = password_verify($userPassword, $resultat['password']);

    if (!$resultat) {
        echo 'Le service est temporairement indisponible, veuillez réessayer plus tard';
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['admin'] = 'Jean';
            adminBoard();
        } else {
            echo 'Mauvais identifiant ou mot de passe ! 
            <a href="index.php">Revenir à l\'accueil</a>
            <a href="index.php?action=login">Connexion</a>';
        }
    }
}

function logOut()
{
    $_SESSION = array();

    require('view/frontend/logout.php');
}