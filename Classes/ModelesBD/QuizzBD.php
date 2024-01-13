<?php

declare(strict_types=1);

namespace ModelesBD;

use PDO;
use Modeles\Quizz\Quizz;
class QuizzBD {
    private $db;

    private $questionBD;

    public function __construct(PDO $db, QuestionBD $questionBD) {
        $this->db = $db;
        $this->questionBD = $questionBD;
    }

    public function createQuizz(string $titreQuizz, string $description, int $typeId, int $userId): void {
        $stmt = $this->db->prepare("INSERT INTO QUIZZ (titre_quizz, description, type_id, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titreQuizz, $description, $typeId, $userId]);
    }

    public function getQuizzById(int $quizzId): Quizz {
        $stmt = $this->db->prepare("SELECT * FROM QUIZZ WHERE idQuizz = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null; // Aucun quizz trouvé avec cet ID
        }
        $quizz = new Quizz($result['idQuizz'], $result['titre_quizz'], $result['description'], $result['type_id'], $result['user_id']);
        return $quizz;
    }

    public function updateQuizz(int $quizzId, string $titreQuizz, string $description, int $typeId, int $userId): void {
        $stmt = $this->db->prepare("UPDATE QUIZZ SET titre_quizz = ?, description = ?, type_id = ?, user_id = ? WHERE idQuizz = ?");
        $stmt->execute([$titreQuizz, $description, $typeId, $userId, $quizzId]);
    }

    public function deleteQuizz(int $quizzId): void {
        // delete en cascade les questions et les choix
        $this->questionBD->deleteQuestionsByQuizzId($quizzId);

        $stmt = $this->db->prepare("DELETE FROM QUIZZ WHERE idQuizz = ?");
        $stmt->execute([$quizzId]);
    }

    public function deleteQuizzByUserId(int $userId): void {
        // récupérer chaque id de quizz associé à l'utilisateur
        $stmt = $this->db->prepare("SELECT idQuizz FROM QUIZZ WHERE user_id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // delete en cascade les questions et les choix associés à chaque quizz
        foreach ($result as $row) {
            $this->deleteQuizz($row['idQuizz']);
        }
    }
}