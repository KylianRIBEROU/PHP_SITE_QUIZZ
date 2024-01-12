<?php 

declare(strict_types=1);

namespace Modeles\Quizz\Types\TypeQuizz;

class TypeQuizzModel {
    public int $idType;
    public string $typeQ;

    public function __construct(int $idType, string $typeQ) {
        $this->idType = $idType;
        $this->typeQ = $typeQ;
    }

    public function getIdType(): int {
        return $this->idType;
    }

    public function getTypeQ(): string {
        return $this->typeQ;
    }

    public function setIdType(int $idType): void {
        $this->idType = $idType;
    }

    public function setTypeQ(string $typeQ): void {
        $this->typeQ = $typeQ;
    }
}