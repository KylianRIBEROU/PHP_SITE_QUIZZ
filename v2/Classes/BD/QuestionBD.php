<?php 

declare(strict_types=1);

namespace BD;

use PDO;

/**
 * Class QuestionBD
 */
final class QuestionBD {

    /**
     * La connexion à la base de données
     * @var PDO
     */
    private $db;

    /**
     * QuestionBD constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Récupère toutes les questions de la base de données
     * @return array
     */
    public function getQuestions(): array {
        $query = "SELECT * FROM QUESTION";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}