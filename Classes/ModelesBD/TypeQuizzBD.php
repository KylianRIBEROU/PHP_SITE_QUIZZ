<?php

declare (strict_types = 1);

namespace ModelesBD;

use PDO;
use Modeles\Quizz\Types\TypeQuizz\TypeQuizz;

class TypeQuizzBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createTypeQuizz(string $typeQ): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUIZZ (typeQ) VALUES (?)");
        $stmt->execute([$typeQ]);
    }

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

    public function updateTypeQuizz(int $typeId, string $typeQ): void {
        $stmt = $this->db->prepare("UPDATE TYPEQUIZZ SET typeQ = ? WHERE idType = ?");
        $stmt->execute([$typeQ, $typeId]);
    }

    public function deleteTypeQuizz(int $typeId): void {
        $stmt = $this->db->prepare("DELETE FROM TYPEQUIZZ WHERE idType = ?");
        $stmt->execute([$typeId]);
    }

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