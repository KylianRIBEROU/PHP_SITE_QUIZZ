<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="top">';
        echo '<h2 class="title-quizz">'.$quizz->getTitre_quizz().'</h2>';
        echo '<p class="nb-question">'.count($questions).' questions</p>';
    echo '</div>';
echo '</div>';