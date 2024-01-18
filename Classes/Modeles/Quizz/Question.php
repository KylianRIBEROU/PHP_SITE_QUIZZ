<?php
declare(strict_types=1);

namespace Modeles\Quizz;

use Modeles\Interfaces\ToHtml;
use Modeles\Interfaces\ToHtmlCorrection;


/**
 * Class Question
 */
class Question implements ToHtml, ToHtmlCorrection
{
    /**
     * L'identifiant de la question
     */
    private int $id_question;

    /**
     * Le libellé de la question
     */
    private string $label;

    /**
     * L'identifiant du type de la question
     */
    private int $id_typeQst;

    /**
     * Les choix de la question
     */
    private array $choix;

    private int $numQuestion;

    private bool $isCorrect;

    /**
     * Le constructeur de la classe
     * @param int $id_question
     * @param string $label
     * @param int $id_typeQst
     */

    public function __construct(int $id_question, string $label, int $id_typeQst)
    {
        $this->id_question = $id_question;
        $this->label = $label;
        $this->id_typeQst = $id_typeQst;
        $this->isCorrect = false;
    }

    /**
     * Retourne l'identifiant de la question
     * @return int
     */
    public function getId_question(): int
    {
        return $this->id_question;
    }

    /**
     * Retourne le libellé de la question
     * @return string
     */
    public function getLabel(): string

    {
        return $this->label;
    }

    /**
     * Retourne l'identifiant du type de la question
     * @return int
     */

    public function getId_typeQst(): int
    {
        return $this->id_typeQst;
    }

    /**
     * Modifie le libellé de la question
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * Modifie l'identifiant du type de la question
     * @param int $id_typeQst
     */
    public function setId_typeQst(int $id_typeQst): void
    {
        $this->id_typeQst = $id_typeQst;
    }

    public function getIsCorrect(): bool
    {
        return $this->isCorrect;
    }

    public function setIsCorrect(bool $isCorrect): void
    {
        $this->isCorrect = $isCorrect;
    }

    /**
     * Retourne les choix de la question
     * @return array
     */
    public function getChoix(): array
    {
        return $this->choix;
    }

    public function getFirstChoix(): Choix
    {
        return $this->choix[0];
    }

    /**
     * Modifie les choix de la question
     * @param array $choix
     */
    public function setChoix(array $choix): void
    {
        $this->choix = $choix;
    }

    /**
     * Retourne le numéro de la question
     * @return int
     */
    public function getNumQuestion(): int
    {
        return $this->numQuestion;
    }

    /**
     * Modifie le numéro de la question
     * @param int $numQuestion
     */
    public function setNumQuestion(int $numQuestion): void
    {
        $this->numQuestion = $numQuestion;
    }

    /**
     * Retourne le rendu HTML de la question
     * @return string
     */
    public function toHtml(): string
    {
        $html = '<div class="question">';
        $html .= '<p class="question-type">'.$this->getNumQuestion().' - '.$this->getFirstChoix()->getTypeQuestionToHtlm().' :</p>';
        $html .= '<p class="question-title">'.$this->getLabel().'</p>';
        $html .= '<div class="reponses">';
        foreach ($this->getChoix() as $choix) {
            $html .= $choix->toHtml();
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    /**
     * Retourne le rendu HTML de la question corrigée
     * @return string
     */
    public function toHtmlCorrection(): string
    {
        $html = '<div class="question-cor">';
        $html .= '<div class="">';
        $html .= '<p class="question-type">'.$this->getNumQuestion().' - '.$this->getFirstChoix()->getTypeQuestionToHtlm().' :</p>';
        $html .= '<p class="question-title">'.$this->getLabel().'</p>';
        $html .= '<div class="reponses">';
        foreach ($this->getChoix() as $choix) {
            $html .= $choix->toHtmlCorrection();
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="res">';
        if ($this->getIsCorrect()){
            $html .= '<p class="correct">Vous avez la bonne réponse</p>';
        }
        else{
            $html .= '<p class="incorrect">Vous avez la mauvaise réponse</p>';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    public function isCorrect(array | string $reponse): bool
    {
        $correct = true;
        if (is_array($reponse)){
            $nbCorrect = 0;
            foreach ($this->getChoix() as $choix) {
                if ($choix->getIsCorrect()){
                    if ($correct = $choix->isCorrect($reponse)){
                        $nbCorrect++;
                    }
                    else{
                        return false;
                    }
                }
            }
            if ($nbCorrect != count($reponse)){
                $correct = false;
            }
            return $correct;
        }
        else{
            foreach ($this->getChoix() as $choix) {
                if ($choix->getIsCorrect()){
                    $correct = $choix->isCorrect($reponse);
                    if ($correct){
                        break;
                    }
                }
            }
            return $correct;
        }
    }
}