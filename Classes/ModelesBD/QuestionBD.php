<?php 

declare(strict_types=1);

namespace ModelesBD;

use PDO;

class QuestionBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createQuestion(string $titreQst, int $quizzId): void {
        $stmt = $this->db->prepare("INSERT INTO QUESTION (titreQst, quizz_id) VALUES (?, ?)");
        $stmt->execute([$titreQst, $quizzId]);
    }

    public function getQuestionById(int $questionId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM QUESTION WHERE idQst = ?");
        $stmt->execute([$questionId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function updateQuestion(int $questionId, string $titreQst, int $quizzId): void {
        $stmt = $this->db->prepare("UPDATE QUESTION SET titreQst = ?, quizz_id = ? WHERE idQst = ?");
        $stmt->execute([$titreQst, $quizzId, $questionId]);
    }

    public function deleteQuestion(int $questionId): void {
        $stmt = $this->db->prepare("DELETE FROM QUESTION WHERE idQst = ?");
        $stmt->execute([$questionId]);
    }
}