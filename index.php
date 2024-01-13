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

$username = "root";
$password = "MaPremiereBD";
$connectionBD = new ConnectionBD($username, $password);

$pdo = $connectionBD->getPDO();
var_dump($pdo);



require 'templates/navBar.php';

echo "<p>test</p>";



?>

</body>
</html>