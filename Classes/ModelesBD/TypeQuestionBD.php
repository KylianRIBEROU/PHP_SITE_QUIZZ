<?php 

declare(strict_types=1);

namespace ModelesBD;

use PDO;
use Modeles\Quizz\Type;
use Modeles\Quizz\Types\TypeQuestion\Text;
use Modeles\Quizz\Types\TypeQuestion\Radio;
use Modeles\Quizz\Types\TypeQuestion\Checkbox;


/**
 * Class TypeQuestionBD
 * @package ModelesBD
 * Cette classe gère les requêtes SQL relatives aux types de question
 */
class TypeQuestionBD {
    
    /**
     * @var PDO
     */
    private $db;

    /**
     * TypeQuestionBD constructor
     * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Crée un type de question dans la base de données
     * @param string $typeQst
     * @return void
     */
    public function createTypeQuestion(string $typeQst): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUESTION (typeQst) VALUES (?)");
        $stmt->execute([$typeQst]);
    }

    /**
     * met a jour un type de question dans la base de données
     * @param int $typeQstId
     * @param string $typeQst
     * @return void
     */
    public function updateTypeQuestion(int $typeQstId, string $typeQst): void {
        $stmt = $this->db->prepare("UPDATE TYPEQUESTION SET typeQst = ? WHERE idTypeQst = ?");
        $stmt->execute([$typeQst, $typeQstId]);
    }

    /**
     * supprime un type de question dans la base de données
     * @param int $typeQstId
     * @return void
     */
    public function deleteTypeQuestion(int $typeQstId): void {
        $stmt = $this->db->prepare("DELETE FROM TYPEQUESTION WHERE idTypeQst = ?");
        $stmt->execute([$typeQstId]);
    }
}