<?php

namespace Blog\Controller;

require 'vendor/autoload.php';

use Model\PostManager;
use Model\CommentManager;
use Blog\Auth;
use Exception;

class backController
{

    public function adminBoard()
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $posts = $postManager->getPosts();
            $alerts = $commentManager->getAlertComments();

            require('view/frontend/homeAdmin.php');
        } else {
            Auth::logout();
        }
    }

    public function checkComment($alertcomment)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $post = $_GET['postid'];
            $commentManager->removeAlert($alertcomment);

            header('Location: index.php?action=homeadmin&origin=checkcomment');
        } else {
            Auth::logout();
        }
    }

    public function newPost()
    {
        if(Auth::isAuth()) {
            require('view/frontend/newpost.php');
        } else {
            Auth::logout();
        }
    }

    public function editPost()
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);

            require('view/frontend/editPost.php');
        } else {
            Auth::logout();
        }
    }

    public function addPost($title, $content)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();

            $affectedLines = $postManager->addPost($title, $content);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin');
            }
        } else {
            Auth::logout();
        }
    }

    public function updatePost($title, $content, $postId)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();

            $affectedLines = $postManager->replacePost($title, $content, $postId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=editpost&origin=editedpost&id=' . $postId);
            }
        } else {
            Auth::logout();
        }
    }

    public function deletePost($postId)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();

            $affectedLines = $postManager->deletePost($postId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin&origin=deletepost');
            }
        } else {
            Auth::logout();
        }
    }

    public function deleteComment($commentId)
    {
        if(Auth::isAuth()) {
            $commentManager = new CommentManager();

            $affectedLines = $commentManager->removeComment($commentId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin&origin=deletecomment');
            }
        } else {
            Auth::logout();
        }
    }

    public function deletePostComment($commentId, $postId)
    {
        if(Auth::isAuth()) {
            $commentManager = new CommentManager();

            $affectedLines = $commentManager->removeComment($commentId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=editpost&origin=deletecomment&id=' . $postId);
            }
        } else {
            Auth::logout();
        }
    }

    public function logOut()
    {
        $_SESSION = array();

        require('view/frontend/logout.php');
    }

    public function publishPost($postId)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();

            $postManager->setPublished($postId);

            header('Location: index.php?action=editpost&origin=publishedpost&id=' . $postId);
        } else {
            Auth::logout();
        }
    }

    public function unpublishPost($postId)
    {
        if(Auth::isAuth()) {
            $postManager = new PostManager();

            $postManager->setUnpublished($postId);

            header('Location: index.php?action=editpost&origin=unpublishedpost&id=' . $postId);
        } else {
            Auth::logout();
        }
    }
}