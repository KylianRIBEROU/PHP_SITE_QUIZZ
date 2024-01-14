<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="Assets/css/base.css"> <!-- Ajoutez cette ligne pour inclure le fichier CSS -->
    <link rel="stylesheet" href="Assets/css/connexion.css">
</head>
<body>


<?php
// SPL autoloader
require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 


use App\KiksQuizz;
// Initialisation de la class qui gère l'application

$app = new KiksQuizz();
$app->afficheAccueil();

?>

</body>
</html>