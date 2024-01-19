<?php 

declare(strict_types=1);

namespace ModelesBD;

use ModelesBD\ChoixBD;
use Modeles\Quizz\Question;
use PDO;

/**
 * Class QuestionBD
 * @package ModelesBD
 * Cette classe gère les requêtes SQL relatives aux questions
 */
class QuestionBD {

    /**
     * @var PDO
     */
    private $db;

    /**
     * @var ChoixBD
     */
    private $choixBD;

    /**
     * QuestionBD constructor
     * @param PDO $db
     * @param ChoixBD $choixBD
     */
    public function __construct(PDO $db, ChoixBD $choixBD) {
        $this->db = $db;
        $this->choixBD = $choixBD;
    }

    /**
     * Crée une question dans la base de données
     * @param string $titreQst
     * @param int $quizzId
     * @param int $typeQstId
     * @return void
     */
    public function createQuestion(string $titreQst, int $quizzId, int $typeQstId): void {
        $stmt = $this->db->prepare("INSERT INTO QUESTION (labelQst, quizz_id, typeQst_id) VALUES (?, ?, ?)");
        $stmt->execute([$titreQst, $quizzId, $typeQstId]);
    }

    /**
     * Renvoie une question à partir de son ID
     * @param int $questionId
     * @return Question|null
     */
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

    /**
     * Met à jour une question dans la base de données
     * @param int $questionId
     * @param string $titreQst
     * @param int $quizzId
     * @return void
     */
    public function updateQuestion(int $questionId, string $titreQst, int $quizzId): void {
        $stmt = $this->db->prepare("UPDATE QUESTION SET titreQst = ?, quizz_id = ? WHERE idQst = ?");
        $stmt->execute([$titreQst, $quizzId, $questionId]);
    }

    /**
     * Supprime une question de la base de données
     * @param int $questionId
     * @return void
     */
    public function deleteQuestion(int $questionId): void {
        // delete en cascade les choix associés à la question
        $this->choixBD->deleteChoixByQuestionId($questionId);

        $stmt = $this->db->prepare("DELETE FROM QUESTION WHERE idQst = ?");
        $stmt->execute([$questionId]);
    }

    /**
     * Supprime toutes les questions d'un quizz
     * @param int $quizzId
     * @return void
     */
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

    /**
     * Renvoie une liste avec toutes les questions d'un quizz
     * @param int $quizzId
     * @return array
     */
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

    /**
     * Renvoie l'ID de la dernière question créée
     * @return int
     */
    public function getLastIdQuestion(): int {
        $stmt = $this->db->prepare("SELECT MAX(idQst) FROM QUESTION");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['MAX(idQst)'];
    }
}