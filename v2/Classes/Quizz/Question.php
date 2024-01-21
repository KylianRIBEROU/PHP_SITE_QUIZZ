<?php
declare(strict_types=1);

namespace Quizz;

use Quizz\Render\RenderInterface;

/**
 * Class Question
 * @package Quizz
 */
abstract class Question implements RenderInterface
{

    /**
     * @var string
     * L'identifiant de la question
     */
    protected string $id;

    /**
     * @var string
     * Le label de la question
     */
    protected string $label;

    /**
     * @var array
     * Les choix de la question
     */
    protected array $choices;

    /**
     * @var array
     * Les réponses de la question
     */
    protected array $answers;

    /**
     * @var string
     * Le type de la question
     */
    protected string $type;

    /**
     * @var array|string
     * Les réponses de l'utilisateur
     */
    protected array | string $answersUser;

    /**
     * @var int
     * Le score de la question
     */
    protected int $score;

    /**
     * Question constructor.
     * @param string $id
     * @param string $label
     * @param array $choices
     * @param array $answers
     * @param string $type
     * @param int $score
     */
    public function __construct(string $id, string $label, array $choices, array $answers, string $type, int $score)
    {
        $this->id = $id;
        $this->label = $label;
        $this->choices = $choices;
        $this->answers = $answers;
        $this->type = $type;
        $this->score = $score;
    }

    /**
     * Renvoie l'identifiant de la question
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Renvoie la question sous forme de code html
     */
    abstract public function render(): string;

    /**
     * Vérifie si la réponse de l'utilisateur est correcte
     */
    abstract public function checkAnswer(): bool;

    /**
     * Renvoie le score obtenu par l'utilisateur
     */
    abstract public function getScoreObtenu(): float;

    /**
     * Set les réponses de l'utilisateur
     */
    public function setAnswers(array | string $answers): void
    {
        $this->answersUser = $answers;
    }

    /**
     * Renvoie le label de la question
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}