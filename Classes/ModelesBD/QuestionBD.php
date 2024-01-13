<?php 

declare(strict_types=1);

namespace ModelesBD;

use ModelesBD\ChoixBD;
use Modeles\Quizz\Question;
use PDO;

class QuestionBD {
    private $db;

    private $choixBD;

    public function __construct(PDO $db, ChoixBD $choixBD) {
        $this->db = $db;
        $this->choixBD = $choixBD;
    }

    public function createQuestion(string $titreQst, int $quizzId): void {
        $stmt = $this->db->prepare("INSERT INTO QUESTION (titreQst, quizz_id) VALUES (?, ?)");
        $stmt->execute([$titreQst, $quizzId]);
    }

    public function getQuestionById(int $questionId): Question {
        $stmt = $this->db->prepare("SELECT * FROM QUESTION WHERE idQst = ?");
        $stmt->execute([$questionId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null; // Aucune question trouvée avec cet ID
        }
        $question = new Question($result['idQst'], $result['titreQst'], $result['quizz_id']);
        return $question;
    }

    public function updateQuestion(int $questionId, string $titreQst, int $quizzId): void {
        $stmt = $this->db->prepare("UPDATE QUESTION SET titreQst = ?, quizz_id = ? WHERE idQst = ?");
        $stmt->execute([$titreQst, $quizzId, $questionId]);
    }

    public function deleteQuestion(int $questionId): void {
        // delete en cascade les choix associés à la question
        $this->choixBD->deleteChoixByQuestionId($questionId);

        $stmt = $this->db->prepare("DELETE FROM QUESTION WHERE idQst = ?");
        $stmt->execute([$questionId]);
    }

    public function deleteQuestionsByQuizzId(int $quizzId): void {
        // récupérer chaque id de question associé au quizz
        $stmt = $this->db->prepare("SELECT idQst FROM QUESTION WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // delete en cascade les choix associés à chaque question
        foreach ($result as $row) {
            $this->deleteQuestion($row['idQst']);
        }
    }

    public function getQuestionsByQuizzId(int $quizzId): array {
        $stmt = $this->db->prepare("SELECT * FROM QUESTION WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $questions = [];
        foreach ($result as $row) {
            $questions[] = new Question($row['idQst'], $row['labelQst'], $row['quizz_id']);
        }
        return $questions;
    }
}