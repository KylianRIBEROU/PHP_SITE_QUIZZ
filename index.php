<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="Assets/css/base.css"> <!-- Ajoutez cette ligne pour inclure le fichier CSS -->
</head>
<body>


<?php
// SPL autoloader
require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 

// Connexion à la base de données ( penser a avoir les extensions pdo activées dans php.ini)
require '_inc/_connection.php';

use ModelesBD\UserBD;
use ModelesBD\QuizzBD;
use ModelesBD\ChoixBD;
use ModelesBD\QuestionBD;
use ModelesBD\TypeQuizzBD;

use DatabaseManager\DataBaseManager;

$username = "root";
$password = "MaPremiereBD";
$connectionBD = new ConnectionBD($username, $password);

$pdo = $connectionBD->getPDO();

$typeQuizzBD = new TypeQuizzBD($pdo);
$choixBD = new ChoixBD($pdo);
$questionBD = new QuestionBD($pdo, $choixBD);
$quizzBD = new QuizzBD($pdo, $questionBD);
$userBD = new UserBD($pdo , $quizzBD);

require 'templates/navBar.php';

echo "<p>Juste des petits tests pour vérifier que les méthodes fonctionnent bien</p>";

echo "<h2>Les utilisateurs</h2>";
$users = $userBD->getAllUsers();

foreach ($users as $user) {
    echo "<h3>" . $user->getUsername() . "</h3>";
    echo "<p> Nombre de quizz postés : " . $quizzBD->countQuizzsByUserId($user->getId()) . "</p>";
}


echo "<h2>Les quizz</h2>";

$quizzs = $quizzBD->getAllQuizz();

foreach ($quizzs as $quizz) {
    echo "<h3>" . $quizz->getTitre_quizz() . "</h3>";
    echo "<p>" . $quizz->getDescription_quizz() . "</p>";
    $typeDuQuiz = $typeQuizzBD->getTypeQuizzById($quizz->getId_quizz());
    echo "<p> Catégorie : " . $typeDuQuiz->getTypeQ() . "</p>";
    $user = $userBD->getUserById($quizz->getId_user());
    echo "<p> Créé par : " . $user->getUsername() . "</p>";
    echo "<p>Nombre de questions : ". count($questionBD->getQuestionsByQuizzId($quizz->getId_quizz())) . "</p>";
}

// Ca fonctionne mais maintenant on utilisera le DatabaseManager pour avoir qu'une seule classe à instancier dans chaque template
$databaseManager = new DataBaseManager($pdo);


?>

</body>
</html>