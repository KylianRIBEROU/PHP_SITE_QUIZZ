<?php
declare(strict_types=1);

namespace Quizz;

use Quizz\Question;

/**
 * Class Quizz
 * @package Quizz
 */
final class Quizz
{
    /**
     * @var array
     * Les questions du quizz
     */
    private array $questions;

    /**
     * Quizz constructor.
     * @param array $questions
     */
    public function __construct(array $questions)
    {
        $this->questions = $questions;
    }

    /**
     * Récupère les questions du quizz
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * Récupère une question du quizz par son id
     * @param string $id
     * @return Question
     * @throws \Exception
     */
    public function getQuestionById(string $id): Question
    {
        foreach ($this->questions as $question) {
            if ($question->getId() === $id) {
                return $question;
            }
        }
        throw new \Exception('Question non trouvée');
    }
}