<?php
// SPL autoloader
require 'Classes/autoloader.php'; 
Autoloader::register(); 

// Parse du fichier JSON

use DataLoader\DataLoader;

$quizz = DataLoader::transformeJsonEnObjet('Data/quizz.json');
