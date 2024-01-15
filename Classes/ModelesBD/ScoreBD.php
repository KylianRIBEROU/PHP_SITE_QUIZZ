<?php 

declare(strict_types=1);

namespace ModelesBD;

use Modeles\Quizz\Score;
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

    public function getScoresByUserId(int $userId): array {
        $stmt = $this->db->prepare("SELECT * FROM SCORE WHERE user_id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $score = [];
        foreach ($result as $row) {
            $score[] = new Score($row['idScore'], $row['score'], $row['user_id'], $row['quizz_id']);
        }
        return $score;
    }

    public function getScoresByQuizzId(int $quizzId): array {
        $stmt = $this->db->prepare("SELECT * FROM SCORE WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $score = [];
        foreach ($result as $row) {
            $score[] = new Score($row['idScore'], $row['score'], $row['user_id'], $row['quizz_id']);
        }
        return $score;
    }

    public function getMoyenneByQuizzId(int $quizzId): float {
        $stmt = $this->db->prepare("SELECT AVG(score) FROM SCORE WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return floatval(number_format(floatval($result['AVG(score)']), 2));
    }
}