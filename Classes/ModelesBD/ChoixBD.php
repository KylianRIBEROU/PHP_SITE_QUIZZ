<?php 

declare(strict_types=1);

namespace ModelesBD;

use Modeles\Quizz\Choix;
use Modeles\Quizz\Types\TypeChoix\Checkbox;
use Modeles\Quizz\Types\TypeChoix\Radio;
use Modeles\Quizz\Types\TypeChoix\Text;
use PDO;

/**
 * Class ChoixBD
 * @package ModelesBD
 * Cette classe gère les requêtes SQL relatives aux choix
 */
class ChoixBD {
    
    /**
     * @var PDO
     */
    private $db;

    /**
     * ChoixBD constructor
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Crée un choix dans la base de données
     * @param string $labelChoix
     * @param int $questionId
     * @param bool $bonneReponse
     * @return void
     */
    public function createChoix(string $labelChoix, int $questionId, bool $bonneReponse): void {
        $bonneRep = $bonneReponse ? 1 : 0;

        $stmt = $this->db->prepare("INSERT INTO CHOIX (labelChoix, question_id, bonneReponse) VALUES (?, ?, ?)");
        $stmt->execute([$labelChoix, $questionId, $bonneRep]);
    }

    /**
     * Renvoie un choix à partir de son ID
     * @param int $choixId
     * @return Choix|null
     */
    public function getChoixById(int $choixId): ?Choix {
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

    /**
     * Met à jour un choix dans la base de données
     * @param int $choixId
     * @param string $labelChoix
     * @param int $questionId
     * @param bool $bonneReponse
     * @return void
     */
    public function updateChoix(int $choixId, string $labelChoix, int $questionId, bool $bonneReponse): void {
        $bonneRep = $bonneReponse ? 1 : 0;
        $stmt = $this->db->prepare("UPDATE CHOIX SET labelChoix = ?, question_id = ?, bonneReponse = ? WHERE idChoix = ?");
        $stmt->execute([$labelChoix, $questionId, $bonneRep, $choixId]);
    }

    /**
     * Supprime un choix de la base de données
     * @param int $choixId
     * @return void
     */
    public function deleteChoix(int $choixId): void {
        $stmt = $this->db->prepare("DELETE FROM CHOIX WHERE idChoix = ?");
        $stmt->execute([$choixId]);
    }

    /** 
     * Supprime tous les choix d'une question
     * @param int $questionId
     * @return void
     */
    public function deleteChoixByQuestionId(int $questionId): void {
        $stmt = $this->db->prepare("DELETE FROM CHOIX WHERE question_id = ?");
        $stmt->execute([$questionId]);
    }

    /**
     * Renvoie une liste avec tous les choix d'une question
     * @param int $questionId
     * @return array
     */
    public function getChoixByQuestionId(int $questionId): array {
        $stmt = $this->db->prepare("SELECT typeQst from QUESTION join TYPEQUESTION on QUESTION.typeQst_id = TYPEQUESTION.idTypeQst WHERE idQst = ?");
        $stmt->execute([$questionId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $typeQst = $result['typeQst'];
        $stmt = $this->db->prepare("SELECT * FROM CHOIX WHERE question_id = ?");
        $stmt->execute([$questionId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $choix = [];
        foreach ($result as $row) {
            $iscorrect = $row['bonneReponse'] == 1 ? true : false;
            if ($typeQst == "radio") {
                $choix[] = new Radio($row['idChoix'], $row['labelChoix'], $iscorrect, $row['question_id']);
                continue;
            }
            else if ($typeQst == "checkbox") {
                $choix[] = new Checkbox($row['idChoix'], $row['labelChoix'], $iscorrect, $row['question_id']);
                continue;
            }
            else if ($typeQst == "text") {
                $choix[] = new Text($row['idChoix'], $row['labelChoix'], $iscorrect, $row['question_id']);
                continue;
            }
        }
        
        return $choix;
    }

}