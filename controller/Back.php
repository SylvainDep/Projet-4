<?php

namespace Blog\Controller;

require 'vendor/autoload.php';

use Model\PostManager as PostManager;
use Model\CommentManager as CommentManager;
use Exception;

class backController
{


    public function adminBoard()
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $posts = $postManager->getPosts();
            $alerts = $commentManager->getAlertComments();

            require('view/frontend/homeAdmin.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function checkComment($alertcomment)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $post = $_GET['postid'];
            $commentManager->removeAlert($alertcomment);

            header('Location: index.php?action=homeadmin&origin=checkcomment');
        } else {
            $this->logOut();
            die();
        }
    }

    public function newPost()
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            require('view/frontend/newpost.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function editPost()
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);

            require('view/frontend/editPost.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function addPost($title, $content)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();

            $affectedLines = $postManager->addPost($title, $content);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin');
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function updatePost($title, $content, $postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();

            $affectedLines = $postManager->replacePost($title, $content, $postId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=editpost&origin=editedpost&id=' . $postId);
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function deletePost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();

            $affectedLines = $postManager->deletePost($postId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin&origin=deletepost');
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function deleteComment($commentId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $commentManager = new CommentManager();

            $affectedLines = $commentManager->removeComment($commentId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=homeadmin&origin=deletecomment');
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function deletePostComment($commentId, $postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $commentManager = new CommentManager();

            $affectedLines = $commentManager->removeComment($commentId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: index.php?action=editpost&origin=deletecomment&id=' . $postId);
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function logOut()
    {
        $_SESSION = array();

        require('view/frontend/logout.php');
    }

    public function publishPost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();

            $postManager->setPublished($postId);

            header('Location: index.php?action=editpost&origin=publishedpost&id=' . $postId);
        } else {
            $this->logOut();
            die();
        }
    }

    public function unpublishPost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new PostManager();

            $postManager->setUnpublished($postId);

            header('Location: index.php?action=editpost&origin=unpublishedpost&id=' . $postId);
        } else {
            $this->logOut();
            die();
        }
    }
}