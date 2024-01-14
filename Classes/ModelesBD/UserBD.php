<?php

declare(strict_types=1);

namespace ModelesBD;

use PDO;
use Modeles\User;
class UserBD {
    private $db;

    private $quizzBD;

    public function __construct(PDO $db, QuizzBD $quizzBD) {
        $this->db = $db;
        $this->quizzBD = $quizzBD;
    }

    public function createUser(string $username, string $password, bool $admin = false): void {
        $stmt = $this->db->prepare("INSERT INTO USER (username, password, admin) VALUES (?, ?, ?)");
        $admin = $admin ? '1' : '0';
        $stmt->execute([$username, $password, $admin]);
    }

    public function getUserById(int $userId): User {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE idUser = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $admin = $result['admin'] === '1' ? true : false;
    
        $user = new User($result['idUser'], $result['username'], $result['password'], $admin);
        return $user;
    }

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

    public function updateUser(int $userId, string $username, string $password, bool $admin): void {
        $stmt = $this->db->prepare("UPDATE USER SET username = ?, password = ?, admin = ? WHERE idUser = ?");
        $stmt->execute([$username, $password, $admin, $userId]);
    }

    public function deleteUser(int $userId): void {
        // delete en cascade les quizz
        $this->quizzBD->deleteQuizzByUserId($userId);

        $stmt = $this->db->prepare("DELETE FROM USER WHERE idUtil = ?");
        $stmt->execute([$userId]);
    }

}
