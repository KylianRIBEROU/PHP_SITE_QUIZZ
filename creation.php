<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="/Assets/css/base.css">
    <link rel="stylesheet" href="/Assets/css/creation.css">
    <script src="/Assets/js/addQuestion.js"></script>
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

if (count($_POST) === 0) {
    $app->afficheCreationQuizz();
}
else {
    $app->creerQuizz($_POST);
}


?>

</body>
</html>