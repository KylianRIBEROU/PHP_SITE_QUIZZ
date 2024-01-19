<?php 

declare(strict_types=1);

namespace ModelesBD;

use Modeles\Quizz\Score;
use PDO;

/*
* Class ScoreBD
* @package ModelesBD
* Cette classe gère les requêtes SQL relatives aux scores
*/
class ScoreBD {

    /**
     * @var PDO
     */
    private $db;

    /**
     * ScoreBD constructor
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Crée un score dans la base de données
     * @param int $score
     * @param int $userId
     * @param int $quizzId
     */
    public function createScore(int $score, int $userId, int $quizzId): void {
        $stmt = $this->db->prepare("INSERT INTO SCORE (score, user_id, quizz_id) VALUES (?, ?, ?)");
        $stmt->execute([$score, $userId, $quizzId]);
    }

    /**
     * Renvoie un score à partir de son ID
     * @param int $scoreId
     * @return array|null
     */
    public function getScoreById(int $scoreId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM SCORE WHERE idScore = ?");
        $stmt->execute([$scoreId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    /**
     * Met à jour un score dans la base de données
     * @param int $scoreId
     * @param int $score
     * @param int $userId
     * @param int $quizzId
     * @return void
     */
    public function updateScore(int $scoreId, int $score, int $userId, int $quizzId): void {
        $stmt = $this->db->prepare("UPDATE SCORE SET score = ?, user_id = ?, quizz_id = ? WHERE idScore = ?");
        $stmt->execute([$score, $userId, $quizzId, $scoreId]);
    }

    /**
     * Supprime un score de la base de données
     * @param int $scoreId
     * @return void
     */
    public function deleteScore(int $scoreId): void {
        $stmt = $this->db->prepare("DELETE FROM SCORE WHERE idScore = ?");
        $stmt->execute([$scoreId]);
    }

    /** 
    * Supprime tous les scores d'un utilisateur
    * @param int $userId
    * @return void
    */
    public function deleteScoresByQuizzId(int $quizzId): void {
        $stmt = $this->db->prepare("DELETE FROM SCORE WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
    }

    /**
     * Renvoie une liste avec tous les scores
     * @param int $userId
     * @return array
     */
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

    /**
     * Renvoie une liste avec tous les scores
     * @param int $userId
     * @return array
     */
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

    /**
     * Renvoie le nombre de scores d'un utilisateur
     * @param int $userId
     * @return int
     */
    public function getMoyenneByQuizzId(int $quizzId): float {
        $stmt = $this->db->prepare("SELECT AVG(score) FROM SCORE WHERE quizz_id = ?");
        $stmt->execute([$quizzId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return floatval(number_format(floatval($result['AVG(score)']), 2));
    }
}