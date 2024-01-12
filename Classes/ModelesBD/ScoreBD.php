<?php 

declare(strict_types=1);

namespace ModelesBD;

use PDO;
class ScoreBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createScore(int $score, int $userId, int $quizzId): void {
        $stmt = $this->db->prepare("INSERT INTO SCORE (score, user_id, quizz_id) VALUES (?, ?, ?)");
        $stmt->execute([$score, $userId, $quizzId]);
    }

    public function getScoreById(int $scoreId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM SCORE WHERE idScore = ?");
        $stmt->execute([$scoreId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function updateScore(int $scoreId, int $score, int $userId, int $quizzId): void {
        $stmt = $this->db->prepare("UPDATE SCORE SET score = ?, user_id = ?, quizz_id = ? WHERE idScore = ?");
        $stmt->execute([$score, $userId, $quizzId, $scoreId]);
    }

    public function deleteScore(int $scoreId): void {
        $stmt = $this->db->prepare("DELETE FROM SCORE WHERE idScore = ?");
        $stmt->execute([$scoreId]);
    }
}