<?php
declare(strict_types=1);

namespace DataLoader;

use DataLoader\LoaderInterface;
use Config\ConnectionBD;
use BD\QuestionBD;
use BD\ChoixBD;
use BD\AnswerBD;
use Quizz\TypeQuestion\QuestionCheckbox;
use Quizz\TypeQuestion\QuestionRadio;
use Quizz\TypeQuestion\QuestionOuverte;
use Quizz\Choix;

/**
 * Class BDLoader
 * Charge les données depuis une base de données
 */
final class BDLoader implements LoaderInterface
{

    /**
     * @var ConnectionBD
     * La connexion à la base de données
     */
    private $connection ;

    /**
     * BDLoader constructor.
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $dbname
     */
    public function __construct(string $username, string $password, string $host, string $dbname)
    {
        $this->connection = new ConnectionBD($username, $password, $host, $dbname);
    }

    /**
     * Récupère les données depuis la base de données
     * @return array
     * @throws \Exception
     */
    public function getData(): array
    {
        $choixBD = new ChoixBD($this->connection->getPDO());
        $questionsBD = new QuestionBD($this->connection->getPDO());
        $answerBD = new AnswerBD($this->connection->getPDO());
        $questions = $questionsBD->getQuestions();
        $res = [];
        foreach ($questions as $question) {
            $type = $question['type'];
            $choicesData = $choixBD->getChoixByQuestionId($question['iduu']);
            $answerData = $answerBD->getAnswerByQuestionId($question['iduu']);
            $choices = [];
            foreach ($choicesData as $choice) {
                $choices[] = new Choix($choice['labelChoix']);
            }
            $answer = [];
            foreach ($answerData as $correct) {
                $answer[] = new Choix($correct['labelChoix']);
            }

            switch ($type) {
                case 'checkbox':
                    $res[] = new QuestionCheckbox($question['iduu'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                case 'radio':
                    $res[] = new QuestionRadio($question['iduu'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                case 'ouverte':
                    $res[] = new QuestionOuverte($question['iduu'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                default:
                    throw new \Exception('Type de question inconnu');
            }
        }
        return $res;
    }
}