<?php 

declare(strict_types=1);

namespace ModelesBD;

use PDO;
class TypeQuestionBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createTypeQuestion(string $typeQst): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUESTION (typeQst) VALUES (?)");
        $stmt->execute([$typeQst]);
    }

    public function getTypeQuestionById(int $typeQstId): ?array {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUESTION WHERE idTypeQst = ?");
        $stmt->execute([$typeQstId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false ? $result : null;
    }

    public function updateTypeQuestion(int $typeQstId, string $typeQst): void {
        $stmt = $this->db->prepare("UPDATE TYPEQUESTION SET typeQst = ? WHERE idTypeQst = ?");
        $stmt->execute([$typeQst, $typeQstId]);
    }

    public function deleteTypeQuestion(int $typeQstId): void {
        $stmt = $this->db->prepare("DELETE FROM TYPEQUESTION WHERE idTypeQst = ?");
        $stmt->execute([$typeQstId]);
    }
}