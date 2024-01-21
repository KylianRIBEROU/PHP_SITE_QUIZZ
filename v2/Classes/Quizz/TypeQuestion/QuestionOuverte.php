<?php
declare(strict_types=1);

namespace Quizz\TypeQuestion;

use Quizz\Question;

/**
 * Class QuestionOuverte
 * @package Quizz\TypeQuestion
 */
final class QuestionOuverte extends Question
{

    /**
     * QuestionOuverte constructor.
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
        $html = "$this->label<br>";
        $html .= "<p> Question à " . $this->score . " point(s) </p>";
        $html .= "<input type='text' name='$this->id'>";
        return $html;
    }

    /**
     * Vérifie si la réponse de l'utilisateur est correcte
     * @return bool
     */
    public function checkAnswer(): bool
    {
        if (!is_array($this->answersUser)) {
            return $this->answersUser === $this->answers[0]->getLabel();
        } else {
            return false ;
        }
    }

    /**
     * Renvoie le score obtenu par l'utilisateur
     * @return float
     */
    public function getScoreObtenu(): float
    {
        if ($this->checkAnswer()) {
            return $this->score;
        } else {
            return 0;
        }
    }
}