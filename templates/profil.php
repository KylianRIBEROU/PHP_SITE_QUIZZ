<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container-profil">';
    echo '<div class="participations">';
        echo '<h2 class="">Mes participations</h2>';
        if (count($mesParticipations) == 0) {
            echo '<p class="no-participation">Vous n\'avez participez a aucun quizz</p>';
        }
        else{
            foreach ($mesParticipations as $uneParticipation) {
                $quizz = $this->dbManager->getQuizzBD()->getQuizzById($uneParticipation->getQuizz_id());
                $auteur = $this->dbManager->getUserBD()->getUserById($quizz->getId_user());
                $lesQuestions = $this->dbManager->getQuestionBD()->getQuestionsByQuizzId($quizz->getId_quizz());
                echo '<div class="participation">';
                    echo '<div class="left-profil">';
                        echo '<p class="name-quizz">' . $quizz->getTitre_quizz() . '</p>';
                        echo '<p class="nb-question">' . count($lesQuestions) . ' questions</p>';
                        echo '<p class="auteur"> By ' . $auteur->getUsername() . '</p>';
                    echo '</div>';
                    echo '<div class="right-profil">';
                        echo '<p class="score">' . $uneParticipation->getScore() . '/'.count($lesQuestions).'</p>';
                        echo '<button onclick="window.location.href=\'quizz.php?idQuizz='.$quizz->getId_quizz().'\'" class="btn-blue">Rejouer</button>';
                    echo '</div>';
                echo '</div>';
            }
        }
    echo '</div>';
    echo '<div class="quizzs">';
        echo '<h2 class="">Mes quizzs</h2>';
        if (count($mesQuizzs) == 0) {
            echo '<p class="no-quizz">Vous n\'avez créé aucun quizz</p>';
        }
        else{
            foreach ($mesQuizzs as $unQuizz) {
                $typeDuQuiz = $this->dbManager->getTypeQuizzBD()->getTypeQuizzById($unQuizz->getId_quizz());
                $lesQuestions = $this->dbManager->getQuestionBD()->getQuestionsByQuizzId($unQuizz->getId_quizz());
                $user = $this->dbManager->getUserBD()->getUserById($unQuizz->getId_user());
                $lesParticipations = $this->dbManager->getScoreBD()->getScoresByQuizzId($unQuizz->getId_quizz());
                echo '<div class="quizz-profil">';
                    echo '<div class="infos-profil">';
                        echo '<p class="name-quizz">' . $unQuizz->getTitre_quizz().'</p>';
                        echo '<p class="nb-question">' . count($lesQuestions) . ' questions</p>';
                        echo '<p class="auteur">'. count($lesParticipations) .' participations</p>';
                    echo '</div>';
                    echo '<div class="infos2-profil">';
                        echo '<p class="moyenne">Moyenne : </p>';
                        if (count($lesParticipations) == 0) {
                            echo '<p class="moyenne-score">--/'.count($lesQuestions).'</p>';
                        }else{
                            echo '<p class="moyenne-score">'. $this->dbManager->getScoreBD()->getMoyenneByQuizzId($unQuizz->getId_quizz()) .'/'.count($lesQuestions).'</p>';
                        }
                        echo '<button class="btn-red" onclick="window.location.href=\'supprimerQuizz.php?idQuizz='.$unQuizz->getId_quizz().'\'">Supprimer</button>';
                    echo '</div>';
                echo '</div>';
            }
        }
    echo '</div>';
echo '</div>';