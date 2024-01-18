<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="Assets/css/base.css">
    <link rel="stylesheet" href="Assets/css/connexion.css">
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

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $inscrit =  $app->inscription($_POST['username'], $_POST['password'], $_POST['password2']);
    if ($inscrit) {
        $app->afficheConnexion();
    }
    else{
        $app->afficheInscription();
    }
}
else{
    $app->afficheInscription();
}

?>


</body>
</html>