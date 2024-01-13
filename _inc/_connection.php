<?php

// connexion a la BD avec PDO 

class ConnectionBD{

    private $username;
    private $password;
    private $pdo;

    public function __construct(string $username, string $password){
        $this->username = $username;
        $this->password = $password;

        $this->connect();
    }

    public function connect(): PDO{
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=BD_PHP_QUIZZ', $this->username, $this->password);
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