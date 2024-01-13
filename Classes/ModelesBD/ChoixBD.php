<?php 

declare(strict_types=1);

namespace ModelesBD;

use Modeles\Quizz\Choix;
use PDO;
class ChoixBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createChoix(string $labelChoix, int $questionId, bool $bonneReponse): void {
        $bonneRep = $bonneReponse ? 1 : 0;

        $stmt = $this->db->prepare("INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES (?, ?, ?)");
        $stmt->execute([$labelChoix, $questionId, $bonneRep]);
    }

    public function getChoixById(int $choixId): Choix {
        $stmt = $this->db->prepare("SELECT * FROM CHOIX WHERE idChoix = ?");
        $stmt->execute([$choixId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null; // Aucun choix trouvé avec cet ID
        }
    
        // Créer une instance de Choix en utilisant les valeurs de la base de données
        $choix = new Choix($result['idChoix'], $result['labelChoix'], $result['bonneReponse'],$result['question_id']);
        
        return $choix;
    }

    public function updateChoix(int $choixId, string $labelChoix, int $questionId, bool $bonneReponse): void {
        $bonneRep = $bonneReponse ? 1 : 0;
        $stmt = $this->db->prepare("UPDATE CHOIX SET labelChoix = ?, question_id = ?, bonneReponse = ? WHERE idChoix = ?");
        $stmt->execute([$labelChoix, $questionId, $bonneRep, $choixId]);
    }

    public function deleteChoix(int $choixId): void {
        $stmt = $this->db->prepare("DELETE FROM CHOIX WHERE idChoix = ?");
        $stmt->execute([$choixId]);
    }

    public function deleteChoixByQuestionId(int $questionId): void {
        $stmt = $this->db->prepare("DELETE FROM CHOIX WHERE question_id = ?");
        $stmt->execute([$questionId]);
    }

    public function getChoixByQuestionId(int $questionId): array {
        $stmt = $this->db->prepare("SELECT * FROM CHOIX WHERE question_id = ?");
        $stmt->execute([$questionId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $choix = [];
        foreach ($result as $row) {
            $choix[] = new Choix($row['idChoix'], $row['labelChoix'], $row['bonneReponse'],$row['question_id']);
        }
        
        return $choix;
    }

}