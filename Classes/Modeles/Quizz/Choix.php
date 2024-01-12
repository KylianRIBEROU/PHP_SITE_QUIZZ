<?php
declare(strict_types=1);

namespace Modeles\Quizz;

/**
 * Class Choix
 */
class Choix
{

    /**
     * l'id du choix
     */
    private int $id_choix;

    /**
     * Le libellé du choix
     */
    private string $label;

    /**
     * Le statut du choix
     */
    private bool $isCorrect;

    /**
     * L'id de la question
     */
    private int $id_question;

    /**
     * Le constructeur de la classe
     * @param int $id_choix
     * @param string $label
     * @param bool $isCorrect
     * @param int $id_question
     */
    public function __construct(int $id_choix , string $label, bool $isCorrect, int $id_question)
    {
        $this->id_choix = $id_choix;
        $this->label = $label;
        $this->isCorrect = $isCorrect;
        $this->id_question = $id_question;
    }

    /**
     * Retourne l'id du choix
     * @return int
     */
    public function getId_choix(): int
    {
        return $this->id_choix;
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

    /**
     * Retourne l'id de la question
     * @return int
     */
    public function getId_question(): int
    {
        return $this->id_question;
    }

    /**
     * Modifie l'id de la question
     * @param int $id_question
     */
    public function setId_question(int $id_question): void
    {
        $this->id_question = $id_question;
    }

}
