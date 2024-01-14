<?php 

declare(strict_types=1);

namespace ModelesBD;

use PDO;
use Modeles\Quizz\Type;
use Modeles\Quizz\Types\TypeQuestion\Text;
use Modeles\Quizz\Types\TypeQuestion\Radio;
use Modeles\Quizz\Types\TypeQuestion\Checkbox;


//TODO: pas fait les types de question, tout est a faire ( leur type, leur rendu en HTML, ....)
class TypeQuestionBD {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createTypeQuestion(string $typeQst): void {
        $stmt = $this->db->prepare("INSERT INTO TYPEQUESTION (typeQst) VALUES (?)");
        $stmt->execute([$typeQst]);
    }

    public function getTypeQuestionById(int $typeQstId): Type {
        $stmt = $this->db->prepare("SELECT * FROM TYPEQUESTION WHERE idTypeQst = ?");
        $stmt->execute([$typeQstId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result_type = $result['typeQst'];
        if ($result === false) {
            return null; // Aucun type trouvé avec cet ID
        }
        if ($result_type === 'text') {
            $typeQuestion = new Text($result['idTypeQst']);
        } elseif ($result_type === 'radio') {
            $typeQuestion = new Radio($result['idTypeQst']);
        } elseif ($result_type === 'checkbox') {
            $typeQuestion = new Checkbox($result['idTypeQst']);
        }
        return $typeQuestion;
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