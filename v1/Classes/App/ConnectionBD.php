<?php

// connexion a la BD avec PDO 

namespace App;

use PDO;
use PDOException;

class ConnectionBD{

    private $username;
    private $password;
    private $pdo;

    private $host ;

    private $dbname;

    public function __construct(){
        $properties = json_decode(file_get_contents('_inc/properties.json'), true);
        $this->username = $properties['database_user'];
        $this->password = $properties['database_password'];
        $this->host = $properties['database_host'];
        $this->dbname = $properties['database_name'];
        $this->connect();
    }

    public function connect(): PDO{
        try {
            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        return $this->pdo;
    }

    public function disconnect(): void{
        $this->pdo = null;
    }

    public function getPDO(): PDO{
        return $this->pdo;
    }
}