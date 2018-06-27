<?php

namespace Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getAlertComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, alert FROM comments WHERE alert = 1 ORDER BY comment_date DESC');

        return $req;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function setAlert($alertcomment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET alert = 1 WHERE id = :commentId');
        $sendAlert = $comments->execute(array(
            'commentId' => $alertcomment
        ));

        return $sendAlert;
    }

    public function removeAlert($alertcomment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET alert = 0 WHERE id = :commentId');
        $sendAlert = $comments->execute(array(
            'commentId' => $alertcomment
        ));

        return $sendAlert;
    }
}
