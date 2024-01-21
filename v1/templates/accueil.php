<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="top">';
        if (isset($this->user)) {
            echo '<h1 class="title-accueil">Bienvenue '. $this->user->getUsername() .'</h1>';
        }
        else{
            echo '<h1 class="title-accueil">Bienvenue sur KiksQuizz</h1>';
        }
    echo '</div>';

// les quizzs $quizzs

foreach ($quizzs as $quizz) {
    $typeDuQuiz = $this->dbManager->getTypeQuizzBD()->getTypeQuizzById($quizz->getId_quizz());
    $lesQuestions = $this->dbManager->getQuestionBD()->getQuestionsByQuizzId($quizz->getId_quizz());
    $user = $this->dbManager->getUserBD()->getUserById($quizz->getId_user());
    echo '<div class="quizz">';
        echo '<div class="infos">';
            echo '<p class="name">' . $quizz->getTitre_quizz() . ' - ' . count($lesQuestions) . ' questions</p>';
            echo '<p class="author">' . $typeDuQuiz->getTypeQ() . ' - By '.$user->getUsername().'</p>';
            echo '<p class="description">' . $quizz->getDescription_quizz() . '</p>';
        echo '</div>';

        echo '<div class="play">';
            echo '<a href="quizz.php?idQuizz='.$quizz->getId_quizz().'" class="play-button">Démarrer';
            echo '<img src="Assets/img/play.png" alt="play" class="play-img">';
            echo '</a>';
        echo '</div>';
    echo '</div>';
}

echo '</div>';