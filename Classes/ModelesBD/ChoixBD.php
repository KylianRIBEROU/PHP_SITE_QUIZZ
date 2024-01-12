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

    public function createChoix(string $labelChoix, int $questionId): void {
        $stmt = $this->db->prepare("INSERT INTO CHOIX (labelChoix, question_id) VALUES (?, ?)");
        $stmt->execute([$labelChoix, $questionId]);
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

    public function updateChoix(int $choixId, string $labelChoix, int $questionId): void {
        $stmt = $this->db->prepare("UPDATE CHOIX SET labelChoix = ?, question_id = ? WHERE idChoix = ?");
        $stmt->execute([$labelChoix, $questionId, $choixId]);
    }

    public function deleteChoix(int $choixId): void {
        $stmt = $this->db->prepare("DELETE FROM CHOIX WHERE idChoix = ?");
        $stmt->execute([$choixId]);
    }
}