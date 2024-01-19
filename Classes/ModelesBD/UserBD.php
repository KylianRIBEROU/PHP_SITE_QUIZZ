<?php

declare(strict_types=1);

namespace ModelesBD;

use PDO;
use Modeles\User;

/**
 * Class UserBD
 * @package ModelesBD
 * Cette classe gère les requêtes SQL relatives aux utilisateurs
 */
class UserBD {

    /**
     * @var PDO
     */
    private $db;

    /**
     * @var QuizzBD
     */
    private $quizzBD;

    /**
     * UserBD constructor
     * @param PDO $db
     * @param QuizzBD $quizzBD
     */
    public function __construct(PDO $db, QuizzBD $quizzBD) {
        $this->db = $db;
        $this->quizzBD = $quizzBD;
    }

    /**
     * Renvoie un utilisateur à partir de son ID
     * @param int $userId
     * @return User|null
     */
    public function connexion(string $username, string $password): ?User {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            if ($result['password'] === $password) {
                $admin = $result['admin'] === '1' ? true : false;
                $user = new User($result['idUser'], $result['username'], $result['password'], $admin);
                return $user;
            }
        }
        return null;
    }

    /**
     * Crée un utilisateur dans la base de données
     * @param string $username
     * @param string $password
     * @param bool $admin
     * @return void
     */
    public function createUser(string $username, string $password, bool $admin = false): void {
        $stmt = $this->db->prepare("INSERT INTO USER (username, password, admin) VALUES (?, ?, ?)");
        $admin = $admin ? '1' : '0';
        $stmt->execute([$username, $password, $admin]);
    }

    /**
     * Renvoie un utilisateur à partir de son ID
     * @param int $userId
     * @return User|null
     */
    public function getUserById(int $userId): User {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE idUser = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $admin = $result['admin'] === '1' ? true : false;
    
        $user = new User($result['idUser'], $result['username'], $result['password'], $admin);
        return $user;
    }

    /**
     * Renvoie les utilisateurs 
     * @return array
     */
    public function getAllUsers(): array {
        $stmt = $this->db->prepare("SELECT * FROM USER");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($result as $user) {
            $admin = $user['admin'] === '1' ? true : false;
            $users[] = new User($user['idUser'], $user['username'], $user['password'], $admin);
        }

        return $users;
    }

    /**
     * Met à jour un utilisateur dans la base de données
     * @param int $userId
     * @param string $username
     * @param string $password
     * @param bool $admin
     * @return void
     */
    public function updateUser(int $userId, string $username, string $password, bool $admin): void {
        $stmt = $this->db->prepare("UPDATE USER SET username = ?, password = ?, admin = ? WHERE idUser = ?");
        $stmt->execute([$username, $password, $admin, $userId]);
    }

    /**
     * Supprime un utilisateur dans la base de données
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId): void {
        // delete en cascade les quizz
        $this->quizzBD->deleteQuizzByUserId($userId);

        $stmt = $this->db->prepare("DELETE FROM USER WHERE idUtil = ?");
        $stmt->execute([$userId]);
    }

}
