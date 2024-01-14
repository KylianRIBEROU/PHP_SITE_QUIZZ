<?php
declare(strict_types=1);

namespace Modeles\Quizz;

abstract class Type{

    private int $id_typeQst;
    private string $label;

    public function __construct(int $id_typeQst ,string $label)
    { 
        $this->id_typeQst = $id_typeQst;
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getIdTypeQst(): int
    {
        return $this->id_typeQst;
    }

    public function setIdTypeQst(int $id_typeQst): void
    {
        $this->id_typeQst = $id_typeQst;
    }

}