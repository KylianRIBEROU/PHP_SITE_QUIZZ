<?php

declare(strict_types=1);

use Quizz\Quizz;

/** @var Quizz quizz */

if ($answers = $_POST){
    $score = 0;
    foreach ($answers as $key => $value){
        $question = $quizz->getQuestionById($key) ;
        $question->setAnswers($value);
        if ($question->checkAnswer()){
            echo "<p> Bonne réponse ";
        }
        else{
            echo "<p> Mauvaise réponse ";
        }
        echo $question->getLabel();
        echo " : ";
        if (is_array($value)){
            foreach ($value as $answer){
                echo $answer . ", ";
            }
        }
        else{
            echo $value;
        }
        echo "</p>";
        $score += $question->getScoreObtenu();
    }

    echo "<p> Votre score est de $score </p>";

}