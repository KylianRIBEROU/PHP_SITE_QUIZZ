<?php

namespace App;

use DatabaseManager\DataBaseManager;
use Modeles\User;
use App\ConnectionBD;

class KiksQuizz {
    private DataBaseManager $dbManager;

    private ?User $user;

    public function __construct() {
        $username = "baptched";
        $password = "baptched";
        $connectionBD = new ConnectionBD($username, $password);
        $pdo = $connectionBD->getPDO();
        $databaseManager = new DataBaseManager($pdo);
        $this->dbManager =$databaseManager;
        $this->user = null;
    }

    public function getDBManager(): DataBaseManager {
        return $this->dbManager;
    }

    public function getUser(): ?User {
        return $this->user;
    }

    public function setUser(User $user): void {
        $this->user = $user;
    }

    public function isUserConnected(): bool {
        return $this->user !== null;
    }

    public function disconnectUser(): void {
        $this->user = null;
    }

    public function afficheAccueil(): void {
        $quizzs = $this->dbManager->getQuizzBD()->getAllQuizz();
        require 'templates/accueil.php';
    }
}