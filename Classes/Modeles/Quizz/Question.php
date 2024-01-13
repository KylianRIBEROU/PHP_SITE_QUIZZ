<?php
declare(strict_types=1);

namespace Modeles\Quizz;


/**
 * Class Question
 */
class Question
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
     * Retourne le tableau des choix de la question
     * @return Choix[]
     */

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
    
}