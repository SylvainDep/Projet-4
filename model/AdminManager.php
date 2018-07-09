<?php

namespace Blog\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
    public function getCredentials()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM member WHERE id = 1');
        $resultat = $req->fetch();

        return $resultat;
    }
}