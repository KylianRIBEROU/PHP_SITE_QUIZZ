<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="Assets/css/base.css">
    <link rel="stylesheet" href="Assets/css/connexion.css">
    <link rel="stylesheet" href="Assets/css/profil.css">
</head>
<body>



<?php
// SPL autoloader

require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 

use App\KiksQuizz;
// Initialisation de la class qui gère l'application
session_start();

$app = new KiksQuizz();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $connected = $app->connexion($_POST['username'], $_POST['password']);
    if ($connected) {
        $app->afficheAccueil();
    }
    else{
        $app->afficheConnexion();
    }
}
else{
    $app->afficheConnexion();
}

?>


</body>
</html>