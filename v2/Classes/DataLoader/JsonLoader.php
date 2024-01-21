<?php
declare(strict_types=1);

namespace DataLoader;

use Quizz\TypeQuestion\QuestionCheckbox;
use Quizz\TypeQuestion\QuestionRadio;
use Quizz\TypeQuestion\QuestionOuverte;
use Quizz\Choix;

/**
 * Class JsonLoader
 * Charge les données depuis un fichier json
 */
final class JsonLoader implements LoaderInterface
{
    /**
     * @var string
     * Le chemin vers le fichier json
     */
    private string $path;

    /**
     * JsonLoader constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Récupère les données depuis le fichier json
     * @return array
     */
    public function getData(): array
    {
        try{
            $json = file_get_contents($this->path);
            $data = json_decode($json, true);
        }
        catch(\Exception $e){
            throw new \Exception('Erreur lors de la récupération des données');
        }

        $questions = [];
        foreach ($data as $question) {
            $type = $question['type'];
            $choices = [];
            foreach ($question['choices'] as $choice) {
                $choices[] = new Choix($choice);
            }
            $answer = [];
            if (is_array($question['correct'])) {
                foreach ($question['correct'] as $correct) {
                    $answer[] = new Choix($correct);
                }
            } else {
                $answer[] = new Choix($question['correct']);
            }
            switch ($type) {
                case 'checkbox':
                    $questions[] = new QuestionCheckbox($question['uuid'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                case 'radio':
                    $questions[] = new QuestionRadio($question['uuid'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                case 'ouverte':
                    $questions[] = new QuestionOuverte($question['uuid'], $question['label'], $choices, $answer, $type, $question['score']);
                    break;
                default:
                    throw new \Exception('Type de question inconnu');
            }
        }
        return $questions;
    }
}