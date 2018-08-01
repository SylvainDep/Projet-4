<?php

namespace Blog\Controller;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

class backController
{
    public function adminBoard()
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();
            $commentManager = new \Blog\Model\CommentManager();

            $posts = $postManager->getPosts();
            $alerts = $commentManager->getAlertComments();

            require('view/frontend/homeadmin.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function checkComment($alertcomment)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();
            $commentManager = new \Blog\Model\CommentManager();

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
            $postManager = new \Blog\Model\PostManager();
            $commentManager = new \Blog\Model\CommentManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);

            require('view/frontend/editpost.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function addPost($title, $content)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();

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
            $postManager = new \Blog\Model\PostManager();

            $affectedLines = $postManager->replacePost($title, $content, $postId);

            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter l\'article !');
            } else {
                header('Location: http://localhost:8888/index.php?action=editpost&origin=editedpost&id=' . $postId);
            }
        } else {
            $this->logOut();
            die();
        }
    }

    public function deletePost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();

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
            $commentManager = new \Blog\Model\CommentManager();

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
            $commentManager = new \Blog\Model\CommentManager();

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
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $_SESSION = array();

            require('view/frontend/logout.php');
        } else {
            $this->logOut();
            die();
        }
    }

    public function publishPost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();

            $postManager->setPublished($postId);

            header('Location: http://localhost:8888/index.php?action=editpost&origin=publishedpost&id=' . $postId);
        } else {
            $this->logOut();
            die();
        }
    }

    public function unpublishPost($postId)
    {
        if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'Jean') {
            $postManager = new \Blog\Model\PostManager();

            $postManager->setUnpublished($postId);

            header('Location: http://localhost:8888/index.php?action=editpost&origin=unpublishedpost&id=' . $postId);
        } else {
            $this->logOut();
            die();
        }
    }
}