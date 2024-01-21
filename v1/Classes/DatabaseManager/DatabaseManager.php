<?php 

declare(strict_types=1);

namespace DatabaseManager;

use PDO;
use ModelesBD\ChoixBD;
use ModelesBD\QuestionBD;
use ModelesBD\QuizzBD;
use ModelesBD\ScoreBD;
use ModelesBD\TypeQuestionBD;
use ModelesBD\TypeQuizzBD;
use ModelesBD\UserBD;

class DataBaseManager {
    private PDO $pdo;

    private UserBD $userBD;

    private QuizzBD $quizzBD;

    private ChoixBD $choixBD;

    private ScoreBD $scoreBD;

    private QuestionBD $questionBD;

    private TypeQuestionBD $typeQuestionBD;

    private TypeQuizzBD $typeQuizzBD;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->typeQuestionBD = new TypeQuestionBD($pdo);
        $this->typeQuizzBD = new TypeQuizzBD($pdo);
        $this->choixBD = new ChoixBD($pdo);
        $this->questionBD = new QuestionBD($pdo, $this->choixBD);
        $this->quizzBD = new QuizzBD($pdo, $this->questionBD);
        $this->userBD = new UserBD($pdo, $this->quizzBD);
        $this->scoreBD = new ScoreBD($pdo);
    }

    public function getPDO(): PDO {
        return $this->pdo;
    }

    public function getUserBD(): UserBD {
        return $this->userBD;
    }

    public function getQuizzBD(): QuizzBD {
        return $this->quizzBD;
    }

    public function getChoixBD(): ChoixBD {
        return $this->choixBD;
    }

    public function getScoreBD(): ScoreBD {
        return $this->scoreBD;
    }

    public function getQuestionBD(): QuestionBD {
        return $this->questionBD;
    }

    public function getTypeQuestionBD(): TypeQuestionBD {
        return $this->typeQuestionBD;
    }

    public function getTypeQuizzBD(): TypeQuizzBD {
        return $this->typeQuizzBD;
    }


    // et donc ici on appellera les méthodes qu'on veut de toutes les classes BD
    // ca fait un peu de redondance de code mais au moins on a qu'une seule classe à instancier partout
}