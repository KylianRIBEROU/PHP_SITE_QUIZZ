<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kil's quizz</title>
    <link rel="stylesheet" href="Assets/css/base.css"> <!-- Ajoutez cette ligne pour inclure le fichier CSS -->
    <link rel="stylesheet" href="Assets/css/connexion.css">
</head>
<body>


<?php
// SPL autoloader
require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 

require 'templates/accueil.php';
?>

</body>
</html>