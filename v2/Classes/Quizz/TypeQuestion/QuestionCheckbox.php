<?php
declare(strict_types=1);

namespace Quizz\TypeQuestion;

use Quizz\Question;

/**
 * Class QuestionCheckbox
 * Classe pour les questions à choix multiples
 */
final class QuestionCheckbox extends Question
{

    /**
     * QuestionCheckbox constructor.
     * @param string $id
     * @param string $label
     * @param array $choices
     * @param array $answers
     * @param string $type
     * @param int $score
     */
    public function __construct(string $id, string $label, array $choices, array $answers, string $type, int $score)
    {
        parent::__construct($id, $label, $choices, $answers, $type, $score);
    }

    /**
     * Renvoie le code html de la question
     * @return string
     */
    public function render(): string
    {
        $html = "$this->label";
        $html .= "<p> Question à " . $this->score . " point(s) </p>";
        $html .= "<p>";
        foreach ($this->choices as $choice) {
            $html .= $choice->render();
            $html .= "<input type='checkbox' name='$this->id[]' value='".$choice->getLabel()."'>";
        }
        $html .= "</p>";
        return $html;
    }

    /**
     * Vérifie si la réponse de l'utilisateur est correcte
     * @return bool
     */
    public function checkAnswer(): bool
    {
        $labelCorrect = [];
        foreach ($this->answers as $answer) {
            $labelCorrect[] = $answer->getLabel();
        }
        if (is_array($this->answersUser)){
            foreach ($this->answersUser as $answer) {
                if (!in_array($answer, $labelCorrect)) {
                    return false;
                }
            }
            return true;
        }
        else{
            return (in_array($this->answersUser, $labelCorrect));
        }
    }

    /**
     * Renvoie le score obtenu par l'utilisateur
     * @return float
     */
    public function getScoreObtenu(): float
    {
        $score = 0;
        $labelCorrect = [];
        foreach ($this->answers as $answer) {
            $labelCorrect[] = $answer->getLabel();
        }
        if (is_array($this->answersUser)){
            foreach ($this->answersUser as $answer) {
                if (in_array($answer, $labelCorrect)) {
                    $score++;
                }
                else{
                    $score--;
                }
            }
        }
        else{
            if (in_array($this->answersUser, $labelCorrect)) {
                $score++;
            }
        }
        if ($score < 0){
            $score = 0;
        }
        $ratio = $score / count($this->answers);
        return $ratio * $this->score;
    }
}