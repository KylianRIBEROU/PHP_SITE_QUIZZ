<?php

declare(strict_types=1);

namespace ModelesBD;

use PDO;
class UserBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createUser(string $username, string $password, bool $admin = false): void {
        $stmt = $this->db->prepare("INSERT INTO USER (username, password, admin) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $admin]);
    }

    public function getUserById(int $userId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM USER WHERE idUtil = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function updateUser(int $userId, string $username, string $password, bool $admin): void {
        $stmt = $this->db->prepare("UPDATE USER SET username = ?, password = ?, admin = ? WHERE idUtil = ?");
        $stmt->execute([$username, $password, $admin, $userId]);
    }

    public function deleteUser(int $userId): void {
        $stmt = $this->db->prepare("DELETE FROM USER WHERE idUtil = ?");
        $stmt->execute([$userId]);
    }
}
