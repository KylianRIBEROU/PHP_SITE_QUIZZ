<?php

namespace App;

use DatabaseManager\DataBaseManager;
use Modeles\User;
use App\ConnectionBD;

class KiksQuizz {
    private DataBaseManager $dbManager;

    private ?User $user;

    public function __construct() {
        $connectionBD = new ConnectionBD();
        $pdo = $connectionBD->getPDO();
        $databaseManager = new DataBaseManager($pdo);
        $this->dbManager =$databaseManager;
        // Si il y a un utilisateur connecté, on le récupère
        if (isset($_SESSION['user'])) {
            $this->user = $this->dbManager->getUserBD()->getUserById($_SESSION['user']);
        }
        else{
            $this->user = null;
        }
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

    public function inscription(string $username, string $password, string $password2): Bool {
        if ($password === $password2) {
            $this->dbManager->getUserBD()->createUser($username, $password);
            return true;
        }
        else{
            return false;
        }
    }

    public function connexion(string $username, string $password): Bool {
        $user = $this->dbManager->getUserBD()->connexion($username, $password);
        if ($user !== null) {
            $this->user = $user;
            // Si l'utilisateur est connecté, on stocke son id dans la session
            $_SESSION['user'] = $user->getId();
            return true;
        }
        else{
            return false;
        }
    }


    public function afficheConnexion(): void {
        if ($this->isUserConnected()) {
            $mesParticipations = $this->dbManager->getScoreBD()->getScoresByUserId($this->user->getId());
            $mesQuizzs = $this->dbManager->getQuizzBD()->getQuizzsByUserId($this->user->getId());
            require 'templates/profil.php';
        }
        else{
            require 'templates/connexion.php';
        }
    }

    public function afficheInscription(): void {
        require 'templates/inscription.php';
    }

    public function afficheAccueil(): void {
        $quizzs = $this->dbManager->getQuizzBD()->getAllQuizz();
        require 'templates/accueil.php';
    }
}