<?php 

declare(strict_types=1);

namespace Modeles\Quizz;

class ScoreModel {

    public int $idScore;
    public int $score;
    public int $user_id;
    public int $quizz_id;

    public function __construct(int $idScore, int $score, int $user_id, int $quizz_id) {
        $this->idScore = $idScore;
        $this->score = $score;
        $this->user_id = $user_id;
        $this->quizz_id = $quizz_id;
    }

    public function getIdScore(): int {
        return $this->idScore;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function getUser_id(): int {
        return $this->user_id;
    }

    public function getQuizz_id(): int {
        return $this->quizz_id;
    }

    public function setIdScore(int $idScore): void {
        $this->idScore = $idScore;
    }

    public function setScore(int $score): void {
        $this->score = $score;
    }

    public function setUser_id(int $user_id): void {
        $this->user_id = $user_id;
    }

    public function setQuizz_id(int $quizz_id): void {
        $this->quizz_id = $quizz_id;
    }
}