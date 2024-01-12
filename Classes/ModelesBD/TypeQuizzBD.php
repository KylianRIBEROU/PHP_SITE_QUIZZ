<?php

declare (strict_types = 1);

namespace ModelesBD;

use PDO;
class TypeQuizzBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createTypeQuizz(string $typeQ): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUIZZ (typeQ) VALUES (?)");
        $stmt->execute([$typeQ]);
    }

    public function getTypeQuizzById(int $typeId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUIZZ WHERE idType = ?");
        $stmt->execute([$typeId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // RESULTAT EST UNE LIGNE DE LA TABLE TYPEQUIZZ. ON DOIT LA TRANSFORMER EN OBJET TYPEQUIZZ
        return $result;
    }

    public function updateTypeQuizz(int $typeId, string $typeQ): void {
        $stmt = $this->db->prepare("UPDATE TYPEQUIZZ SET typeQ = ? WHERE idType = ?");
        $stmt->execute([$typeQ, $typeId]);
    }

    public function deleteTypeQuizz(int $typeId): void {
        $stmt = $this->db->prepare("DELETE FROM TYPEQUIZZ WHERE idType = ?");
        $stmt->execute([$typeId]);
    }
}