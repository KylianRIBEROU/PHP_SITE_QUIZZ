<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="top">';
        echo '<h2 class="title-quizz">'.$quizz->getTitre_quizz().'</h2>';
        echo '<p class="nb-question">'.count($questions).' questions</p>';
    echo '</div>';

    echo '<form action="/correction.php/?idQuizz='.$quizz->getId_quizz().'" method="post">';
        echo '<div class="questions">';
            foreach ($questions as $question) {
                echo $question->toHtml();
            }
        echo '</div>';
        echo '<div class="btn-quizz">';
            echo '<button type="submit" class="btn btn-val">Valider</button>';
        echo '</div>';
    echo '</form>';
echo '</div>';