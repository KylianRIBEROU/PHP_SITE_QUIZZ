<?php
declare(strict_types=1);

namespace Modeles\Quizz\Types\TypeChoix;

use Modeles\Quizz\Choix;

final class Checkbox extends Choix
{
    public function __construct(int $id_Choix, string $label, bool $isCorrect, int $id_question)
    {
        parent::__construct($id_Choix, $label, $isCorrect, $id_question);
    }

    public function toHtml(): string
    {
        $html = "<div class='form-check'>";
        $html .= "<input class='form-check-input' type='checkbox' value='{$this->getId_choix()}' name='{$this->getId_question()}[]'>";
        $html .= "<p class='form-check-label'>{$this->getLabel()}</p>";
        $html .= "</div>";
        return $html;
    }

    public function toHtmlCorrection(): string
    {
        $html = "<div class='form-check'>";
        if ($this->getIsCorrect()) {
            $html .= "<input class='form-check-input' type='checkbox' value='{$this->getId_choix()}' name='{$this->getId_question()}[]' checked disabled>";
        } else {
            $html .= "<input class='form-check-input' type='checkbox' value='{$this->getId_choix()}' name='{$this->getId_question()}[]' disabled>";
        }
        $html .= "<p class='form-check-label'>{$this->getLabel()}</p>";
        $html .= "</div>";
        return $html;
    }

    public function getTypeQuestionToHtlm(): string
    {
        return "QCM";
    }

    public function isCorrect(array | string $reponse): bool
    {
        if (is_array($reponse)) {
            foreach ($reponse as $value) {
                if ($value == $this->getId_choix()) {
                    return true ;
                }
            }
        }
        return false;
    }
}
