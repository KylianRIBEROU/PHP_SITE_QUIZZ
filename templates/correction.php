<?php
declare(strict_types=1);

include 'templates/navBar.php';


echo '<div class="container">';
    echo '<div class="top">';
        echo '<h2 class="title-quizz">'.$quizz->getTitre_quizz().'</h2>';
        echo '<p class="nb-question">Correction '.$score .'/'.count($questions).'</p>';
    echo '</div>';

    echo '<div class="questions">';
        foreach ($questions as $question) {
            echo $question->toHtmlCorrection();
        }
    echo '</div>';
    echo '<div class="btn-quizz">';
        echo '<button class="btn btn-val" onclick="window.location.href=\'/accueil.php\'">Finir</button>';
    echo '</div>';
echo '</div>';