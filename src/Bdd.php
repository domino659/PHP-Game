<?php

class Bdd
{
    private $dsn = 'mysql:host=db;dbname=gamephp';
    private $user = 'root';
    private $pwd = 'root';

    function dbConnect()
    {
        try {
            return  new PDO($this->dsn, $this->user, $this->pwd);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function request($requeteSql)
    {
        $query = $this->dbConnect()->query($requeteSql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
}