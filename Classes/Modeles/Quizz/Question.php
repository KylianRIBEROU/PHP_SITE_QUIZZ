<?php
declare(strict_types=1);

namespace Quizz;

use Quizz\Type;
use Quizz\Choix;

/**
 * Class Question
 */
class Question
{
    /**
     * L'identifiant de la question
     */
    private string $id;

    /**
     * Le libellé de la question
     */
    private string $label;

    /**
     * Le type de la question
     */
    private Type $leType;

    /**
     * Le tableau des choix de la question
     * @var Choix[]
     */
    private array $lesChoix;

    /**
     * Le constructeur de la classe
     * @param string $id
     * @param string $label

     * @param Type $leType
     * @param Choix[] $lesChoix
     */
    public function __construct(string $id, string $label,Type $leType, array $lesChoix)
    {
        $this->id = $id;
        $this->label = $label;
        $this->leType = $leType;
        $this->lesChoix = $lesChoix;
    }

    /**
     * Retourne l'id de la question
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * Retourne le nombre de points de la question
     * @return int
     */

    /**
     * Retourne le type de la question
     * @return Type
     */
    public function getLeType(): Type
    {
        return $this->leType;
    }

    /**
     * Retourne le tableau des choix de la question
     * @return Choix[]
     */
    public function getLesChoix(): array
    {
        return $this->lesChoix;
    }
}