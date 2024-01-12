<?php
declare(strict_types=1);

namespace DataLoader;

use ExceptionQuizz\ExceptionAucunQuizz;
use Quizz\Quizz;
use Quizz\Types\Checkbox;
use Quizz\Types\Radio;
use Quizz\Types\Text;
use Quizz\Question;
use Quizz\Choix;
use ExceptionQuizz\ExceptionTypeInconnu;

/**
 * Class qui permet de charger les données
 */
class DataLoader
{
    /**
     * Parse un fichier JSON et retourne un tableau
     * @param string $path
     * @return array
     */
    public static function parseJsonQuizz(string $path): array
    {
        $content = file_get_contents($path);
        $quizz = json_decode($content, true);

        if (empty($quizz)) {
            throw new ExceptionAucunQuizz();
        }
        return $quizz;
    }

    public static function transformeJsonEnObjet(string $path): array
    {
        $quizz = self::parseJsonQuizz($path);
        foreach ($quizz as $key => $value) {
            self::transformeQuestionEnObjet($value['questions']);
            #$quizz[$key] = new Quizz($value['id'], $value['label'], $value['questions']);
        }
        return $quizz;
    }

    public static function transformeQuestionEnObjet(array $lesQuestions): array
    {
        $questions = [];
        foreach ($lesQuestions as $key => $value) {
            $les_choix = self::transformeChoixEnObjet($value['choices'], $value['correct']);
            switch ($value['type']) {
                case 'checkbox':
                    $type = new Checkbox();
                    break;
                case 'radio':
                    $type = new Radio();
                    break;
                case 'text':
                    $type = new Text();
                    break;
                default:
                    throw new ExceptionTypeInconnu();
            }
            $questions[$key] = new Question($value['uuid'], $value['label'], $value['points'], $type, $les_choix);
        }
        return $questions;
    }

    public static function transformeChoixEnObjet(array $lesChoix, $lesReponses): array
    {
        $choix = [];
        foreach ($lesChoix as $key => $label) {
            $isCorrect = $label == $lesReponses;
            $choix[$key] = new Choix($label, $isCorrect);
        }
        return $choix;
    }
}