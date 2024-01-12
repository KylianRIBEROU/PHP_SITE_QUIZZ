<?php

declare(strict_types=1);

namespace ModelesBD;

use PDO;

class QuizzBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createQuizz(string $titreQuizz, string $description, int $typeId, int $userId): void {
        $stmt = $this->db->prepare("INSERT INTO QUIZZ (titre_quizz, description, type_id, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titreQuizz, $description, $typeId, $userId]);
    }

    public function getQuizzById(int $quizzId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM QUIZZ WHERE idQuizz = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function updateQuizz(int $quizzId, string $titreQuizz, string $description, int $typeId, int $userId): void {
        $stmt = $this->db->prepare("UPDATE QUIZZ SET titre_quizz = ?, description = ?, type_id = ?, user_id = ? WHERE idQuizz = ?");
        $stmt->execute([$titreQuizz, $description, $typeId, $userId, $quizzId]);
    }

    public function deleteQuizz(int $quizzId): void {
        $stmt = $this->db->prepare("DELETE FROM QUIZZ WHERE idQuizz = ?");
        $stmt->execute([$quizzId]);
    }
}