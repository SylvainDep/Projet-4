<?php

namespace Blog\Controller;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

class frontController
{
    public function listPosts()
    {
        $postManager = new \Blog\Model\PostManager();
        $posts = $postManager->getPosts();


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

    public function doAlert($post, $alertcomment)
    {
        $postManager = new \Blog\Model\PostManager();
        $commentManager = new \Blog\Model\CommentManager();

        $post = $_GET['postid'];
        $commentManager->setAlert($_GET['commentid']);

        header('Location: index.php?action=post&id=' . $post);
    }
}