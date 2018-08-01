<?php

namespace Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\')AS creation_date_fr, published FROM post ORDER BY creation_date DESC ');

        return $req;
    }

    public function getPublishedPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\')AS creation_date_fr, published FROM post WHERE published = 1 ORDER BY creation_date DESC ');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, published FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO post(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content));

        return $affectedLines;
    }

    public function replacePost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('UPDATE post SET title = :newtitle, content = :newcontent WHERE id = :id');
        $sendAlert = $posts->execute(array(
            'newtitle' => $title,
            'newcontent' => $content,
            'id' => $postId
        ));

        return $sendAlert;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('DELETE FROM post WHERE id = :id');
        $affectedLines = $posts->execute(array(
            'id' => $postId
        ));

        return $affectedLines;
    }

    public function setPublished($postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET published = 1 WHERE id = :postId');
        $sendAlert = $post->execute(array(
            'postId' => $postId
        ));

        return $sendAlert;
    }

    public function setUnpublished($postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET published = 0 WHERE id = :postId');
        $sendAlert = $post->execute(array(
            'postId' => $postId
        ));

        return $sendAlert;
    }
}
