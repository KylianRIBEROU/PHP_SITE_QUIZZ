<?php 

declare(strict_types=1);

namespace BD;

use PDO;

/**
 * Class AnswerBD
 */
final class AnswerBD {

    /**
     * La connexion à la base de données
     * @var PDO
     */
    private $db;

    /**
     * AnswerBD constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Récupère toutes les reponses d'une question de la base de données
     * @param string $id l'id de la question
     * @return array les reponses
     */
    public function getAnswerByQuestionId(string $id): array {
        $query = "SELECT * FROM CORRECT WHERE question_iduu = :id";
        $result = $this->db->prepare($query);
        $result->execute(['id' => $id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}