<?php
declare(strict_types=1);

namespace Quizz;

/**
 * Class Choix
 */
class Choix
{
    /**
     * Le libellé du choix
     */
    private string $label;

    /**
     * Le statut du choix
     */
    private bool $isCorrect;

    /**
     * Le constructeur de la classe
     * @param string $label
     * @param bool $isCorrect
     */
    public function __construct(string $label, bool $isCorrect)
    {
        $this->label = $label;
        $this->isCorrect = $isCorrect;
    }

    /**
     * Retourne le libellé du choix
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Retourne le statut du choix
     * @return bool
     */
    public function getIsCorrect(): bool
    {
        return $this->isCorrect;
    }

    /**
     * Modifie le libellé du choix
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * Modifie le statut du choix
     * @param bool $isCorrect
     */
    public function setIsCorrect(bool $isCorrect): void
    {
        $this->isCorrect = $isCorrect;
    }
}
