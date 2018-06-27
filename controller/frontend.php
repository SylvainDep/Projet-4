<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/header.php');
    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/header.php');
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
  require('view/frontend/header.php');
  require('view/frontend/login.php');
}

function adminBoard()
{
  $postManager = new \Blog\Model\PostManager();
  $commentManager = new \Blog\Model\CommentManager();

  $posts = $postManager->getPosts();
  $alerts = $commentManager->getAlertComments();

  require('view/frontend/header.php');
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

function checkComment($post, $alertcomment)
{
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();

    $post = $_GET['postid'];
    $commentManager->removeAlert($_GET['commentid']);

    header('Location: index.php?action=homeadmin');
}
