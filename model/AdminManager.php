<?php

namespace Blog\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
    public function getPassword()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, password FROM member WHERE id = 1');
        $resultat = $req->fetch();

        return $resultat;
    }
}