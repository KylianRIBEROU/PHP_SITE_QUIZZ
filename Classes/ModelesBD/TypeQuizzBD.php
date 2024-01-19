<?php

declare (strict_types = 1);

namespace ModelesBD;

use PDO;
use Modeles\Quizz\Types\TypeQuizz\TypeQuizz;

/**
 * Class TypeQuizzBD
 * @package ModelesBD
 * Cette classe gère les requêtes SQL relatives aux types de quizz
 */
class TypeQuizzBD {

    /**
     * @var PDO
     */
    private $db;

    /**
     * TypeQuizzBD constructor
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Crée un type de quizz dans la base de données
     * @param string $typeQ
     * @return void
     */
    public function createTypeQuizz(string $typeQ): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUIZZ (typeQ) VALUES (?)");
        $stmt->execute([$typeQ]);
    }

    /**
     * Renvoie un type de quizz à partir de son ID
     * @param int $typeId
     * @return TypeQuizz|null
     */
    public function getTypeQuizzById(int $typeId): TypeQuizz {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUIZZ WHERE idType = ?");
        $stmt->execute([$typeId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null; // Aucun type trouvé avec cet ID
        }
        $typeQuizz = new TypeQuizz($result['idType'], $result['typeQ']);
        return $typeQuizz;
    }

    /**
     * Met à jour un type de quizz dans la base de données
     * @param int $typeId
     * @param string $typeQ
     */
    public function updateTypeQuizz(int $typeId, string $typeQ): void {
        $stmt = $this->db->prepare("UPDATE TYPEQUIZZ SET typeQ = ? WHERE idType = ?");
        $stmt->execute([$typeQ, $typeId]);
    }

    /**
     * Supprime un type de quizz dans la base de données
     * @param int $typeId
     * @return void
     */
    public function deleteTypeQuizz(int $typeId): void {
        $stmt = $this->db->prepare("DELETE FROM TYPEQUIZZ WHERE idType = ?");
        $stmt->execute([$typeId]);
    }

    /**
     * Renvoie une liste avec tous les types de quizz
     * @return array
     */
    public function getAllTypeQuizz(): array {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUIZZ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $liste_typeQuizz = [];
        foreach ($result as $row) {
            $liste_typeQuizz[] = new TypeQuizz($row['idType'], $row['typeQ']);
        }
        return $liste_typeQuizz;
    }

    /**
     * Renvoie un type de quizz à partir de son type
     * @param string $typeQ
     * @return TypeQuizz|null
     */
    public function getTypeQuizzByType(string $typeQ): TypeQuizz {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUIZZ WHERE typeQ = ?");
        $stmt->execute([$typeQ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null; // Aucun type trouvé avec cet ID
        }
        $typeQuizz = new TypeQuizz($result['idType'], $result['typeQ']);
        return $typeQuizz;
    }
}