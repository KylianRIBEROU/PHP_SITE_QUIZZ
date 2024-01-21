<?php
declare(strict_types=1);


// connexion a la BD avec PDO 

namespace Config;

use PDO;
use PDOException;


/**
 * Class ConnectionBD
 * Classe de connexion à la base de données
 */
final class ConnectionBD{

    /**
     * @var string
     * Le nom d'utilisateur de la base de données
     */
    private $username;

    /**
     * @var string
     * Le mot de passe de la base de données
     */
    private $password;

    /**
     * @var string
     * L'hôte de la base de données
     */
    private $host;

    /**
     * @var string
     * Le nom de la base de données
     */
    private $dbname;

    /**
     * @var PDO
     * La connexion à la base de données
     */
    private $pdo;

    /**
     * ConnectionBD constructor.
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $dbname
     */
    public function __construct(string $username, string $password, string $host="localhost", string $dbname){
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
        $this->dbname = $dbname;

        $this->connect();
    }

    /**
     * Connexion à la base de données
     * @return PDO
     */
    public function connect(): PDO{
        try {
            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        return $this->pdo;
    }

    /**
     * Récupère la connexion à la base de données
     * @return PDO
     */
    public function getPDO(): PDO{
        return $this->pdo;
    }
}