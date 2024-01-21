<?php 

declare(strict_types=1);

namespace BD;

use PDO;

/**
 * Class ChoixBD
 */
final class ChoixBD {

    /**
     * La connexion à la base de données
     * @var PDO
     */
    private $db;

    /**
     * ChoixBD constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Récupère tous les choix d'une question de la base de données
     * @param string $id l'id de la question
     * @return array les choix
     */
    public function getChoixByQuestionId(string $id): array {
        $query = "SELECT * FROM choix WHERE question_iduu = :id";
        $result = $this->db->prepare($query);
        $result->execute(['id' => $id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}