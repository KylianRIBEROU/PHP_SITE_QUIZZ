<?php
declare(strict_types=1);

namespace Modeles\Quizz;

/**
 * Class Quizz
 */
class Quizz
{

    private string $id;
    private string $label;
    private array $questions;

    public function __construct(string $id, string $label, array $questions)
    {
        $this->id = $id;
        $this->label = $label;
        $this->questions = $questions;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function getLabel(): string
    {
        return $this->label;
    }
    
    public function getQuestions(): array
    {
        return $this->questions;
    }
    
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
    
    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

}

