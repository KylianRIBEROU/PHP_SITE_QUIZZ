<?php
declare(strict_types=1);

namespace Modeles\Quizz;

/**
 * Class Quizz
 */
class Quizz
{

    private int $id_quizz;
    
    private string $titre_quizz;

    private string $description_quizz;

    private int $id_typeQuizz;

    private int $id_user;

    public function __construct(int $id_quizz, string $titre_quizz, string $description_quizz, int $id_typeQuizz, int $id_user)
    {
        $this->id_quizz = $id_quizz;
        $this->titre_quizz = $titre_quizz;
        $this->description_quizz = $description_quizz;
        $this->id_typeQuizz = $id_typeQuizz;
        $this->id_user = $id_user;
    }

    public function getId_quizz(): int
    {
        return $this->id_quizz;
    }

    public function getTitre_quizz(): string
    {
        return $this->titre_quizz;
    }

    public function getDescription_quizz(): string
    {
        return $this->description_quizz;
    }

    public function getId_typeQuizz(): int
    {
        return $this->id_typeQuizz;
    }

    public function getId_user(): int
    {
        return $this->id_user;
    }

    public function setId_quizz(int $id_quizz): void
    {
        $this->id_quizz = $id_quizz;
    }

    public function setTitre_quizz(string $titre_quizz): void
    {
        $this->titre_quizz = $titre_quizz;
    }

    public function setDescription_quizz(string $description_quizz): void
    {
        $this->description_quizz = $description_quizz;
    }

    public function setId_typeQuizz(int $id_typeQuizz): void
    {
        $this->id_typeQuizz = $id_typeQuizz;
    }

    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }
}

