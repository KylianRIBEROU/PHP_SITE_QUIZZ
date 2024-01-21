<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kik's quizz</title>
    <link rel="stylesheet" href="/Assets/css/base.css">
    <link rel="stylesheet" href="/Assets/css/connexion.css">
    <link rel="stylesheet" href="/Assets/css/profil.css">
</head>
<body>

<?php
// SPL autoloader

require 'Classes/Autoloader/autoloader.php'; 
Autoloader::register(); 

use App\KiksQuizz;

session_start();

$app = new KiksQuizz();
$app->deleteQuizz($_GET['idQuizz']);