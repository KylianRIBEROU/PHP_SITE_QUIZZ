<?php
declare(strict_types=1);

namespace Modeles\Quizz\Types\TypeChoix;

use Modeles\Quizz\Choix;

final class Text extends Choix
{
    public function __construct(int $id_Choix, string $label, bool $isCorrect, int $id_question)
    {
        parent::__construct($id_Choix, $label, $isCorrect, $id_question);
    }

    public function toHtml(): string
    {
        $html = "<div class='form-group'>";
        $html .= "<input type='text' class='form-control' name='{$this->getId_question()}' id='textForm' aria-describedby='textForm' placeholder='Votre réponse'>";
        $html .= "</div>";
        return $html;
    }

    public function toHtmlCorrection(): string
    {
        $html = "<div class='form-group'>";
        $html .= "<input type='text' class='form-control' value='{$this->getLabel()}' name='{$this->getId_question()}' id='textForm' aria-describedby='textForm' placeholder='Votre réponse' disabled>";
        $html .= "</div>";
        return $html;
    }


    public function getTypeQuestionToHtlm(): string
    {
        return "Question ouverte";
    }

    public function isCorrect(array | string $reponse): bool
    {
        if (is_string($reponse)) {
            return ($reponse == $this->getLabel());
        }
        return false;
    }
}
