<?php

namespace Model;

class Manager
{
    protected function dbDevConnect()
    {
        $db = new \PDO('mysql:host=sylvaindbasalut.mysql.db;dbname=sylvaindbasalut;charset=utf8', 'sylvaindbasalut', 'Solange78');
        return $db;
    }

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=alaska_blog', 'root', 'root');
        return $db;
    }
}
