<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="/Assets/css/base.css">
    <link rel="stylesheet" href="/Assets/css/quizz.css">
</head>
<body>


<?php
// SPL autoloader

require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 

use App\KiksQuizz;

session_start();

// Initialisation de la class qui gère l'application
$app = new KiksQuizz();

$idQuizz = $_GET['idQuizz'];
$lesReponses = $_POST;

$app->afficheCorrection($idQuizz, $lesReponses);

?>

</body>
</html>