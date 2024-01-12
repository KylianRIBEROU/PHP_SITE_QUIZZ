<?php
declare(strict_types=1);

namespace Modeles\Quizz;

use Modeles\Quizz\Type;
use Modeles\Quizz\Choix;

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
     * Le tableau des choix de la question
     * @var Choix[]
     */
    private array $lesChoix;

    /**
     * Le constructeur de la classe
     * @param int $id_question
     * @param string $label
     * @param int $id_typeQst
     * @param Choix[] $lesChoix
     */

    public function __construct(int $id_question, string $label, int $id_typeQst, array $lesChoix)
    {
        $this->id_question = $id_question;
        $this->label = $label;
        $this->id_typeQst = $id_typeQst;
        $this->lesChoix = $lesChoix;
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
    public function getLesChoix(): array
    {
        return $this->lesChoix;
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
    
    /**
     * Modifie le tableau des choix de la question
     * @param Choix[] $lesChoix
     */
    public function setLesChoix(array $lesChoix): void
    {
        $this->lesChoix = $lesChoix;
    }

    /**
     * Ajoute un choix au tableau des choix de la question
     * @param Choix $choix
     */
    public function addChoix(Choix $choix): void
    {
        $this->lesChoix[] = $choix;
    }

    /**
     * Supprime un choix du tableau des choix de la question
     * @param Choix $choix
     */
    public function removeChoix(Choix $choix): void
    {
        $index = array_search($choix, $this->lesChoix);
        if ($index !== false) {
            unset($this->lesChoix[$index]);
        }
    }
    
}