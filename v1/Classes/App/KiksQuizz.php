<?php

namespace App;

use DatabaseManager\DataBaseManager;
use Modeles\User;
use App\ConnectionBD;

class KiksQuizz {
    private DataBaseManager $dbManager;

    private ?User $user;

    public function __construct() {
        $connectionBD = new ConnectionBD();
        $pdo = $connectionBD->getPDO();
        $databaseManager = new DataBaseManager($pdo);
        $this->dbManager =$databaseManager;
        // Si il y a un utilisateur connecté, on le récupère
        if (isset($_SESSION['user'])) {
            $this->user = $this->dbManager->getUserBD()->getUserById($_SESSION['user']);
        }
        else{
            $this->user = null;
        }
    }

    public function getDBManager(): DataBaseManager {
        return $this->dbManager;
    }

    public function getUser(): ?User {
        return $this->user;
    }

    public function setUser(User $user): void {
        $this->user = $user;
    }

    public function isUserConnected(): bool {
        return $this->user !== null;
    }

    public function deleteQuizz(int $idQuizz): void {
        $this->dbManager->getScoreBD()->deleteScoresByQuizzId($idQuizz);
        $this->dbManager->getQuizzBD()->deleteQuizz($idQuizz);
        $this->afficheConnexion();
    }

    public function disconnectUser(): void {
        $this->user = null;
    }

    public function inscription(string $username, string $password, string $password2): Bool {
        if ($password === $password2) {
            $this->dbManager->getUserBD()->createUser($username, $password);
            return true;
        }
        else{
            return false;
        }
    }

    public function connexion(string $username, string $password): Bool {
        $user = $this->dbManager->getUserBD()->connexion($username, $password);
        if ($user !== null) {
            $this->user = $user;
            // Si l'utilisateur est connecté, on stocke son id dans la session
            $_SESSION['user'] = $user->getId();
            return true;
        }
        else{
            return false;
        }
    }


    public function afficheConnexion(): void {
        if ($this->isUserConnected()) {
            $mesParticipations = $this->dbManager->getScoreBD()->getScoresByUserId($this->user->getId());
            $mesQuizzs = $this->dbManager->getQuizzBD()->getQuizzsByUserId($this->user->getId());
            require 'templates/profil.php';
        }
        else{
            require 'templates/connexion.php';
        }
    }

    public function afficheInscription(): void {
        require 'templates/inscription.php';
    }

    public function afficheAccueil(): void {
        $quizzs = $this->dbManager->getQuizzBD()->getAllQuizz();
        require 'templates/accueil.php';
    }

    public function afficheQuizz(int $idQuizz): void {
        $quizz = $this->dbManager->getQuizzBD()->getQuizzById($idQuizz);
        $questions = $this->dbManager->getQuestionBD()->getQuestionsByQuizzId($idQuizz);
        $numQuestion = 1;
        foreach ($questions as $question) {
            $choix = $this->dbManager->getChoixBD()->getChoixByQuestionId($question->getId_question());
            $question->setChoix($choix);
            $question->setNumQuestion($numQuestion);
            $numQuestion++;
        }
        $choixBD = $this->dbManager->getChoixBD();
        require 'templates/quizz.php';
    }

    public function afficheCorrection(int $idQuizz, array $lesReponses): void {
        $quizz = $this->dbManager->getQuizzBD()->getQuizzById($idQuizz);
        $questions = $this->dbManager->getQuestionBD()->getQuestionsByQuizzId($idQuizz);
        $numQuestion = 1;
        foreach ($questions as $question) {
            $choix = $this->dbManager->getChoixBD()->getChoixByQuestionId($question->getId_question());
            $question->setChoix($choix);
            $question->setNumQuestion($numQuestion);
            $numQuestion++;
        }
        $score = 0;
        foreach ($lesReponses as $idQuestion => $reponse) {
            foreach ($questions as $question) {
                if ($question->getId_question() == $idQuestion) {
                    if ($question->isCorrect($reponse)) {
                        $score++;
                        $question->setIsCorrect(true);
                    }
                }
            }
        }
        $this->dbManager->getScoreBD()->createScore($score, $this->user->getId(), $idQuizz);
        require 'templates/correction.php';
    }

    public function afficheCreationQuizz(): void {
        $lesTypes = $this->dbManager->getTypeQuizzBD()->getAllTypeQuizz();
        require 'templates/creation.php';
    }


    public function creerQuizz(array $lesInfos): void {
        $nbQuestion = $lesInfos['nbQuestion'];
        $titre = $lesInfos['titre'];
        $description = $lesInfos['description'];
        $typeQuizz = $lesInfos['typeQuizz'];
        $lesQuesstions = [];
        for ($i=1; $i <= $nbQuestion; $i++) {
            $typeQuestion = $lesInfos['typeQuestion'.$i];
            $labelQuestion = $lesInfos['labelQuestion'.$i];
            $j = 1;
            if ($typeQuestion == 3) {
                $leChoix = $lesInfos['choixQuestions'.$i];
                $lesQuesstions[] = [$typeQuestion, $labelQuestion, $leChoix];
            }
            else{
                $lesChoix = [];
                while (isset($lesInfos['labelChoix'.$j.'Questions'.$i])) {
                    $labelChoix = $lesInfos['labelChoix'.$j.'Questions'.$i];
                    $isCorrect = false;
                    if (isset($lesInfos['choixQuestions'.$i])) {
                        foreach ($lesInfos['choixQuestions'.$i] as $choix) {
                            if ($choix == $j) {
                                $isCorrect = true;
                            }
                        }
                    }
                    
                    $lesChoix[] = [$labelChoix, $isCorrect];
                    $j++;
                }
                $lesQuesstions[] = [$typeQuestion, $labelQuestion, $lesChoix];
            }
        }
        // Affichage des infos du quizz
        $this->dbManager->getQuizzBD()->createQuizz($titre, $description, $typeQuizz, $this->user->getId());
        $idQuizz = $this->dbManager->getQuizzBD()->getLastIdQuizz();
        foreach ($lesQuesstions as $question) {
            $typeQuestion = $question[0];
            $labelQuestion = $question[1];
            $this->dbManager->getQuestionBD()->createQuestion($labelQuestion, $idQuizz, $typeQuestion);
            $idQuestion = $this->dbManager->getQuestionBD()->getLastIdQuestion();
            if ($typeQuestion == 3) {
                $leChoix = $question[2];
                $this->dbManager->getChoixBD()->createChoix($leChoix, $idQuestion, true);
            }
            else{
                $lesChoix = $question[2];
                foreach ($lesChoix as $choix) {
                    $labelChoix = $choix[0];
                    $isCorrect = $choix[1];
                    $this->dbManager->getChoixBD()->createChoix($labelChoix, $idQuestion, $isCorrect);
                }
            }
        }
        $this->afficheAccueil();
    }
}